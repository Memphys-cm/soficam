<?php

namespace App\Http\Livewire\Portal\Lotissements;

use App\Models\User;
use Livewire\Component;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Parcel;
use App\Models\Lotissements\Lotissement;

class Sale extends Component
{

    public Block $block;
    public ?Parcel $parcel;

    public $users, $notares, $surface_for_sale, $price_per_m², $sale_amount, $payment_method, $notary, $service_id;

    public function mount($lotissement_id)
    {
        $this->lotissement = Lotissement::findOrFail($lotissement_id);
        $this->notaires = MembreDuCabinet::notaire()->select('id', 'first_name', 'last_name')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();
    }

    public function initLotData($id)
    {
        $this->parcel = Parcel::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.portal.lotissements.sale');
    }
}
