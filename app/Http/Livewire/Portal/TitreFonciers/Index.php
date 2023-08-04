<?php

namespace App\Http\Livewire\Portal\TitreFonciers;

use App\Http\Livewire\Traits\WithDataTables;
use App\Models\TitreFoncier;
use Livewire\Component;

class Index extends Component
{
    use WithDataTables;

    

    public function render()
    {
        $titrefonciers = TitreFoncier::with('users')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $titrefonciers_count = TitreFoncier::count();

        return view('livewire.portal.titre-fonciers.index',[
            'titrefonciers' => $titrefonciers,
            'titrefonciers_count' => $titrefonciers_count,
        ])->layout('components.layouts.dashboard');
    }
}
