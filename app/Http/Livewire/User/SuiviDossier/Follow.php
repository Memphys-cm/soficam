<?php

namespace App\Http\Livewire\User\SuiviDossier;

use Livewire\Component;

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

        return view('livewire.user.suivi-dossier.follow', [
            'immatriculations' => $immatriculations,
        ]);
    }
}
