<?php

namespace App\Http\Livewire\User\SuiviDossier;

use Livewire\Component;
use App\Models\ImmatriculationDirecte;
use App\Models\Lotissements\Parcel;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\Auth;





class Index extends Component
{
    public function render()
    {
        // $titrefonciers = auth()->user()->titrefonciers;
        // $mutations = auth()->user()->mutations;
        $immatriculations = auth()->user()->imma_directes;

        return view('livewire.user.suivi-dossier.index', [
            'immatriculations' => $immatriculations
        ])->layout('components.layouts.user.master');
    }
}
