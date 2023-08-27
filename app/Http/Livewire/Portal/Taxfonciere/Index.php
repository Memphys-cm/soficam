<?php

namespace App\Http\Livewire\Portal\Taxfonciere;

use Livewire\Component;
use App\Models\TitreFoncier;
use Hachther\MeSomb\Operation\Payment\Collect;

class Index extends Component
{
    public $numero_titre_foncier;
    public $tax_amount;
    public $paymentStatus, $titrefoncier, $price, $transaction_number;

    public function paiement()
    {
        $request = new Collect('651897233', 1000, 'MTN', 'CM');

        $payment = $request->pay();

        if($payment->success){
            // Fire some event,Pay someone, Alert user
        } else {
            // fire some event, redirect to error page
        }

        // get Transactions details $payment->transactions
    }

    public function mount()
    {
        $titre_foncier = TitreFoncier::all();
    }
    public function initData($id)
    {
        $titrefoncier = TitreFoncier::findOrFail($id);

        $this->titrefoncier = $titrefoncier;

        $this->numero_titre_foncier =  $titrefoncier->numero_titre_foncier;
        $this->price =  $titrefoncier->price;
        $this->transaction_number =  $titrefoncier->transaction_number;

        // Calculate the tax_amount (0.1% of the price)
        $this->tax_amount = $this->price * 0.001;
    }

    public function render()
    {
        $titrefonciers = TitreFoncier:: all();
        $titrefonciers_count = TitreFoncier::count();
        return view('livewire.portal.taxfonciere.index', [
            'titrefonciers' => $titrefonciers,
            'titrefonciers_count' => $titrefonciers_count,
        ]);
    }
}
