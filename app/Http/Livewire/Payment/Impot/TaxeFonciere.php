<?php

namespace App\Http\Livewire\Payment\Impot;

use Livewire\Component;

class TaxeFonciere extends Component
{
    public function render()
    {
        return view('livewire.payment.impot.taxe-fonciere')->layout('livewire.payment.impot.app');
    }
}
