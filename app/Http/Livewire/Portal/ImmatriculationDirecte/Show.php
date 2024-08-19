<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use App\Models\User;
use App\Models\Region;
use App\Models\Service;
use Livewire\Component;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps\HandlesCotationCsdaf;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps\HandlesOrdreVersement;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps\HandlesAvisPublicDescente;

class Show extends Component
{
    use HandlesCotationCsdaf , HandlesOrdreVersement, HandlesAvisPublicDescente;  // Inclure le Trait

    public $imma_directe;
    public $services, $regions;
    public $service_id, $user_id;
    public $observation;
    public $users;
    public $high_step = 1;
    public $step = 1;
    public $montant_ordre_versement;

    public function mount($code)
    {
        $this->imma_directe = ImmatriculationDirecte::where('reference', $code)->first();
        $this->services = Service::select('id', 'service_name_fr')->get();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();
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
        return view('livewire.portal.immatriculation-directe.show');
    }
}
