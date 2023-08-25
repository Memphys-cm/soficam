<?php

namespace App\Http\Livewire\Portal\Taxfonciere;

use Livewire\Component;
use App\Models\TitreFoncier;
use Hachther\MeSomb\Operation\Payment\Collect;

class Index extends Component
{
    public $numero_titre_foncier;
    public $tax_amount;
    public $paymentStatus;

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
