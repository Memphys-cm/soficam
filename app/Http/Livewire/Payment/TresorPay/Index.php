<?php

namespace App\Http\Livewire\Payment\TresorPay;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.payment.tresor-pay.index')->layout('livewire.payment.master_tresor');
    }
}
