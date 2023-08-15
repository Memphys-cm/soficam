<?php

namespace App\Http\Livewire\Portal\Maps;

use Livewire\Component;
use App\Models\TitreFoncier;

class Index extends Component
{
    public function render()
{
    $titles = TitreFoncier::all();

        $tf = TitreFoncier::findOrFail(50);
        $newArray = [
            ["564321.00, 452564.00"], 
            ["564335.746, 452548.271"],
             ["564315.224,452531.059"], 
             ["564303.601,452544.471"]
        ];


    return view('livewire.portal.maps.index', compact('titles', 'newArray'));
}
}
