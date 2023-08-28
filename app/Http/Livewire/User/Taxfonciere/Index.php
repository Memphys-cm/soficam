<?php

namespace App\Http\Livewire\User\Taxfonciere;

use Livewire\Component;
use App\Models\TitreFoncier;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    public $numero_titre_foncier;
    public $tax_amount;
    public $paymentStatus, $titrefoncier, $price, $transaction_number;

    // public function paiement()
    // {
    //     $request = new Collect('677551952', 100, 'MTN', 'CM');

    //     $payment = $request->pay();

    //     if($payment->success){
    //         // Fire some event,Pay someone, Alert user
    //     } else {
    //         // fire some event, redirect to error page
    //     }

    //     // get Transactions details $payment->transactions
    // }

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
        $titresFonciers = auth()->user()->titrefonciers;
        // dd($titresFonciers);
        // dd(auth()->user()->id); 
        $titrefonciers_count = TitreFoncier::count();
        return view('livewire.user.taxfonciere.index', [
            'titresFonciers' => $titresFonciers,
            'titrefonciers_count' => $titrefonciers_count,
        ]);
    }

}
