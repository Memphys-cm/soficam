<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Cotation;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\ImmatriculationDirecte;
use Spatie\LivewireWizard\Components\StepComponent;

class CotationCsdafStep extends StepComponent
{
    public $imma_directe;
    public $service_id;
    public $user_id;
    public $observation;

    public $services;
    public $users;

    public $errorsList = [];

    public function mount($imma_direct_id = null)
    {
        if ($imma_direct_id) {
            $this->imma_directe = ImmatriculationDirecte::findOrFail($imma_direct_id);
        }

        $this->services = \App\Models\Service::all();
        $this->users = \App\Models\User::all();
    }


    protected $rules = [
        'service_id' => 'required',
        'user_id' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $this->imma_directe->update([
                'service_id' => $this->service_id,
                'observation_cotation' => $this->observation,
                'cotation_user_id' => $this->user_id,
                'status_cotation' => 'done',
                'statut' => 'coter',
                'next_step' => 'ordre_versement',
                'date_cotation' => Carbon::now(),
            ]);
        });

        session()->flash('message', 'Dossier coté au CSDA avec succès!');

        $this->nextStep();
    }

    public function stepInfo(): array
    {
        return [
            'label' => __('Cotation du Dossier au CSDAF'),
            'icon' => 'fa-shopping-cart',
        ];
    }

    public function render()
    {
        return view('livewire.portal.immatriculation-directe.steps.cotation.cotation-csdaf-step');
    }
}
