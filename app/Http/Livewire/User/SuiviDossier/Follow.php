<?php

namespace App\Http\Livewire\User\SuiviDossier;

use Livewire\Component;
use App\Models\TitreFoncier;
use App\Models\ImmatriculationDirecte;

class Follow extends Component
{
    
    public $currentStep = 2;
    public $showCotationDetails = false;
    public $showOrdreVersementDetails = false;


    public function nextStep()
    {
        $this->currentStep++;
    }

    public function render()
    {
        $immatriculations = auth()->user()->imma_directes;
        $titrefonciers = auth()->user()->titrefonciers;

        $combinedData = $titrefonciers->concat($immatriculations);

        return view('livewire.user.suivi-dossier.follow', [
            'combinedData' => $combinedData,
        ])->layout('components.layouts.user.master');
    }
}
