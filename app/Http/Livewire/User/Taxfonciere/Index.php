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
    public $phoneNumber = ''; 
    public $status_tax, $tax_amount, $price, $payment_method;

    public function confirmOrder()
    {
        $rules = [
            'paymentType' => 'required|in:MTN,ORANGE',
        ];

        if ($this->paymentType === 'MTN') {
            $rules['phoneNumber'] = [
                'required',
                'regex:/(:?^6(:?(:?7)(:?\d){7}$))|(:?^6(:?(:?5[0-4])(:?\d){6}$))|(:?^6(:?(:?8)(:?\d){7}$))/',
            ];
        } elseif ($this->paymentType === 'ORANGE') {
            $rules['phoneNumber'] = [
                'required',
                'regex:/(:?^6(:?(:?9)(:?\d){7}$))|(:?^6(:?(:?5[5-9])(:?\d){6}$))/',
            ];
        }

        $this->validate($rules);

        $request = new Collect($this->phoneNumber, $this->tax_amount, $this->paymentType, 'CM');
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
        $this->price =  $titrefoncier->price;


        $this->tax_amount = $this->price * 0.001;
    }

    public function update()
    {
        $this->validate(
            [
                'tax_amount' => 'required|integer',

            ]
        );
        if (!empty($this->titrefoncier)) {

            $this->titrefoncier->update([
                'status_tax' => $this->status_tax,
                'date_tax' => now(),
                'tax_amount' => $this->tax_amount,

            ]);
            $sale = Sale::create([
                'sales_amount' => $this->tax_amount,
                'sales_type' => 'tax_foncier',
                'payment_status' => 'totally_paid',
                'created_by' => auth()->user()->name,
            ]);
            // dd($sale);
            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->tax_amount,
                'quantity' => 1,
                'saleable_id' => $this->titrefoncier->id,
                'saleable_type' => 'tax_foncier', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);
        }


        $this->clearFields();

        $this->refresh(__('Tax Foncier successfully Updated'), 'paiement');
    }
    public function render()
    {
        $titrefonciers = auth()->user()->titrefonciers;
       
        return view('livewire.user.taxfonciere.index', [
            'titrefonciers' => $titrefonciers,
        ]);
    }

}
