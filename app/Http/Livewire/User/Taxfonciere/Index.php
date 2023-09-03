<?php

namespace App\Http\Livewire\User\Taxfonciere;

use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use Hachther\MeSomb\Operation\Payment\Collect;

class Index extends Component
{

    use WithDataTables;

    public $numero_titre_foncier, $users;
    public $titrefoncier, $transaction_number;
    public $paymentType = ''; 
    public $phone_number = ''; 
    public $status_tax, $taxFoncier_amount, $price, $payment_method;

    public function confirmOrder()
    {
        $rules = [
            'paymentType' => 'required|in:MTN,ORANGE',
        ];

        if ($this->paymentType === 'MTN') {
            $rules['phone_number'] = [
                'required',
                'regex:/(:?^6(:?(:?7)(:?\d){7}$))|(:?^6(:?(:?5[0-4])(:?\d){6}$))|(:?^6(:?(:?8)(:?\d){7}$))/',
            ];
        } elseif ($this->paymentType === 'ORANGE') {
            $rules['phone_number'] = [
                'required',
                'regex:/(:?^6(:?(:?9)(:?\d){7}$))|(:?^6(:?(:?5[5-9])(:?\d){6}$))/',
            ];
        }

        $this->validate($rules);

        $request = new Collect($this->phone_number, $this->taxFoncier_amount, $this->paymentType, 'CM');
        $payment = $request->pay();

        if ($payment->success) {
            $this->update();
        } else {
            return redirect()->back()->with('error', 'Payment failed');
        }
    }

    public function mount()
    {
     
        $this->titrefoncier = TitreFoncier::all();
    }

    public function initData($id)
    {
        $titrefoncier = TitreFoncier::findOrFail($id);

        $this->titrefoncier = $titrefoncier;

        $this->status_tax =  $titrefoncier->status_tax;
        $this->taxFoncier_amount =  $titrefoncier->taxFoncier_amount;
    }

    public function update()
    {
        $this->validate(
            [
                'taxFoncier_amount' => 'required|integer',
            ]
        );
        if (!empty($this->titrefoncier)) {
            $user = auth()->user(); // Get the authenticated user
            $this->titrefoncier->update([
                'status_tax' => 'payer',
                'date_tax' => now(),
                'taxFoncier_amount' => $this->taxFoncier_amount,

            ]);
            $sale = Sale::create([
                'user_id' => $user->id,
                'sales_amount' => $this->taxFoncier_amount,
                'sales_type' => 'tax_foncier',
                'payment_status' => 'totally_paid',
                'created_by' => auth()->user()->name,
            ]);
            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->taxFoncier_amount,
                'quantity' => 1,
                'saleable_id' => $this->titrefoncier->id,
                'saleable_type' => 'App\Models\TitreFoncier',
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);
        }


        $this->clearFields();

        $this->refresh(__('Tax Foncier successfully Updated'), 'paiement');
    }
    public function clearFields()
    {
        $this->payment_method = '';
        $this->taxFoncier_amount   = '';
        $this->phoneNumber = '';
    }
    public function render()
    {
        $titrefonciers = auth()->user()->titrefonciers;
       
        return view('livewire.user.taxfonciere.index', [
            'titrefonciers' => $titrefonciers,
            'titrefonciers_count' => count(auth()->user()->titrefonciers)
        ])->layout('components.layouts.user.master');
    }

}
