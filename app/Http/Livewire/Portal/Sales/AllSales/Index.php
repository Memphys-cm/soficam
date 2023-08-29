<?php

namespace App\Http\Livewire\Portal\Sales\AllSales;

use Livewire\Component;
use App\Models\Operation;
use App\Models\Sales\Sale;
use App\Models\EtatCession;
use App\Models\Sales\Saleable;
use App\Models\ReleveImmobilier;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatePropriete;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Receipt;
use Hachther\MeSomb\Operation\Payment\Collect;

class Index extends Component
{
    use WithDataTables;
    public ?Sale $sale;
    public ?Saleable $saleable;
    public $allsales, $allsalesId, $sales_amount, $sales_code, $payment_method, $payment_status, $commentaires;
    public $sales_type, $payment_number;

    public function initData($id)
    {
        $sale = Sale::findOrFail($id);
        $this->sale = $sale;
        $this->saleable = $sale->saleables()->first();
        $this->sales_amount = number_format($sale->sales_amount);
    }

    public function updatedPaymentMethod($type)
    {
        if($type !== 'cash'){
            $this->payment_number = $this->sale->user->primary_phone_number;
        }else{
            $this->payment_number = null; 
        }
    }

    public function mount(){
        $this->allsales = Sale::all();
    }

    public function payment(){

        $this->validate([
            'payment_method' => 'required',
            'sales_amount' => 'required',
            'payment_number' => 'required_if:payment_method,mtn_mobile_money,orange_money'
        ]);    

        DB::transaction(function () {

            if($this->payment_method !== 'cash'){
                try {
                    
                    $request = new Collect($this->payment_number, $this->sale->sales_amount, $this->payment_method == 'mtn_mobile_money' ? 'MTN' : 'ORANGE', 'CM');
    
                    $payment = $request->pay();
    
                    if (!$payment->success) {
                        return;
                    } 
                } catch (\Throwable $th) {
                    throw $th;
                }
            }

            $this->sale->update([
                'payment_status' => 'totally_paid',
                'payment_number' => $this->payment_number,
                'payment_method' => $this->payment_method,
            ]);


            // when sales is successful
            // 1. Get the saleable item for that sale.
            // 2. Query and get the instance of the saleable item class
            // 3. Update the status of this item.

           $saleable_item =  Saleable::findOrFail($this->saleable->id);

           match ($saleable_item->saleable_type){
                'App\Models\EtatCession'  => optional(EtatCession::whereId($saleable_item->saleable_id))->update(['status'=> 'paid']),
                'App\Models\CertificatePropriete'  => optional(CertificatePropriete::whereId($saleable_item->saleable_id))->update(['status'=> 'active']),
                'App\Models\Operation'  => optional(Operation::whereId($saleable_item->saleable_id))->update(['statut_conservateur'=> 'ongoing']),
                default => ''
           };

           // save receipt

           Receipt::create([
                'receipt_code' => $this->sale->sales_code,
                'sale_id' => $this->sale->id,
                'receveur_id' => auth()->user()->id,
           ]);

        });

        $this->refresh(__('Sales Updated Created!'), 'updatePaySaleModal');

        $this->clearFields();
    }

    public function clearFields()
    {
        $this->payment_method = '';
        $this->sales_amount = '';
        $this->sales_type = '';
        $this->payment_status = '';
        $this->sale = null;
        $this->saleable = null;
    }

    public function delete()
    {
        if ($this->allsales) {
            $this->allsales->delete();
           
        }
        $this->refresh(__('Sale deleted successfully'), 'DeleteModal');

    }

    public function render()
    {

        $allsaless = Sale::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $allsales_count = Sale::count();
        return view('livewire..portal.sales.all-sales.index', ['allsaless'=>$allsaless, 'allsales_count'=>$allsales_count]);
    }
}
