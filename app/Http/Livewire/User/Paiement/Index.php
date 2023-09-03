<?php

namespace App\Http\Livewire\User\Paiement;

use App\Models\Receipt;
use Livewire\Component;
use App\Models\Operation;
use App\Models\Sales\Sale;
use App\Models\EtatCession;
use App\Models\Sales\Saleable;
use App\Models\ReleveImmobilier;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatePropriete;
use Illuminate\Support\Facades\Auth;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;
use Hachther\MeSomb\Operation\Payment\Collect;

class Index extends Component
{
    use WithDataTables;
    public ?string $query = null;
    public $allsales, $user, $amount, $phone_number, $payment_method, $sale;

    public function mount(){
        $this->user = Auth::user();
        $this->allsales = Sale::where('user_id', $this->user->id)->get();
    }

    public function initData($id) 
    {
        if(!empty($id)){
            $sale = Sale::findOrFail($id);
            $this->sale = $sale;
            $this->amount = $sale->sales_amount;
            $this->phone_number = auth()->user()->primary_phone_number;
        }
    }

    public function confirmPayment()
    {

        $this->validate([
            'payment_method' => 'required',
            'amount' => 'required',
            'phone_number' => 'required'
        ]);

        DB::transaction(function () {

            try {

                $request = new Collect($this->phone_number, $this->amount, $this->payment_method == 'mtn_mobile_money' ? 'MTN' : 'ORANGE', 'CM');

                $payment = $request->pay();

                if (!$payment->success) {
                    return;
                }
            } catch (\Throwable $th) {
                throw $th;
            }

            if(!empty($this->sale)){

                $this->sale->update([
                    'user_id' => auth()->user()->id,
                    'payment_status' => 'totally_paid',
                    'payment_number' => $this->phone_number,
                    'payment_method' => $this->payment_method,
    
                ]);

                // when sales is successful
                // 1. Get the saleable item for that sale.
                // 2. Query and get the instance of the saleable item class
                // 3. Update the status of this item.

                $saleable_item =  Saleable::whereSaleId($this->sale->id)->first();

                match ($saleable_item->saleable_type) {
                    'App\Models\EtatCession'  => optional(EtatCession::whereId($saleable_item->saleable_id))->update(['status' => 'paid']),
                    'App\Models\ReleveImmobilier'  => optional(ReleveImmobilier::whereId($saleable_item->saleable_id))->update(['status' => 'active']),
                    'App\Models\CertificatePropriete'  => optional(CertificatePropriete::whereId($saleable_item->saleable_id))->update(['status' => 'active']),
                    'App\Models\Operation'  => optional(Operation::whereId($saleable_item->saleable_id))->update(['statut_conservateur' => 'ongoing']),
                    'App\Models\ImmatriculationDirecte'  => optional(ImmatriculationDirecte::whereId($saleable_item->saleable_id))->update(['status_ordre_versement' => 'done', 'statut' => 'Ordre de Versement Payer', 'next_step' => 'Preparation Avis Au publique']),
                    default => ''
                };
    
                // save receipt
    
                Receipt::create([
                    'receipt_code' => $this->sale->sales_code,
                    'sale_id' => $this->sale->id,
                    'receveur_id' => auth()->user()->id,
                ]);
            }
        });

        $this->refresh(__('Sales Updated Created!'), 'updatePaySaleModal');

        $this->clearFields();
    }

    public function render()
    {
        $this->user = Auth::user();

        $allsaless = Sale::search($this->query)
        ->where('user_id', $this->user->id)
        ->orderBy($this->orderBy, $this->orderAsc)
        ->paginate($this->perPage);

        $allsales_count = Sale::where('user_id', $this->user->id)->count();

        return view('livewire.user.paiement.index', ['allsaless'=>$allsaless, 'allsales_count'=>$allsales_count])->layout('components.layouts.user.master');
    }
}
