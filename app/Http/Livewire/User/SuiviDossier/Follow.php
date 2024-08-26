<?php

namespace App\Http\Livewire\User\SuiviDossier;

use Livewire\Component;
use App\Models\TitreFoncier;
use App\Models\ImmatriculationDirecte;
use Illuminate\Support\Facades\Auth;

class Follow extends Component
{
    
    public $currentStep = 2;
    public $showCotationDetails = false;
    public $showOrdreVersementDetails = false;
    public $immatriculations;
    public $services, $regions;
    public $service_id, $user_id;
    public $observation;
    public $users;
    public $high_step = 1;
    public $step = 1;
    public $montant_ordre_versement;

    public function mount($code)
    {
        $this->immatriculations = Auth::user()->imma_directes->where('reference', $code)->first();
    }

    public function nextStep()
    {
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }


    public function nextHighStep()
    {
        $this->high_step++;
    }

    public function prevHighStep()
    {
        $this->high_step--;
    }

    public function setStep($step)
    {
        $this->step = $step;
    }

    public function setHighStep($step)
    {
        $this->high_step = $step;
    }


    public function render()
    {
        $immatriculations = auth()->user()->imma_directes;
        $titrefonciers = auth()->user()->titrefonciers;
        #dd($immatriculations);

        return view('livewire.user.suivi-dossier.follow', [
            'immatriculations' => $this->immatriculations,
        ])->layout('components.layouts.user.master');
    }
}
