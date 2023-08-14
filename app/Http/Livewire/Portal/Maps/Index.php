<?php

namespace App\Http\Livewire\Portal\Maps;

use Livewire\Component;
use App\Models\TitreFoncier;

class Index extends Component
{
    public function render()
{
    $titles = TitreFoncier::all();

    return view('livewire.portal.maps.index', compact('titles'));
}


}
