<?php

namespace App\Http\Livewire\Portal\Lotissements;

use Livewire\Component;
use App\Models\Lotissements\Lotissement;

class Sale extends Component
{

    public Block $block;
    public Parcel $parcel;


    public function mount($lotissement_id)
    {
        $this->lotissement = Lotissement::findOrFail($lotissement_id);
    }
    
    public function render()
    {
        return view('livewire.portal.lotissements.sale');
    }
}
