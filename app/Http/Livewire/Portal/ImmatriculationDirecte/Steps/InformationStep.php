<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Steps;

use App\Models\ImmatriculationDirecte;
use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class InformationStep extends StepComponent
{

    public $imma_directe;

    public $service_id;

    protected $rules = [
        'service_id' => 'required',
    ];

    public function mount($imma_direct_id = null)
    {
        $imma_directe = ImmatriculationDirecte::findOrFail($imma_direct_id);
        $this->imma_directe = $imma_directe;

    }

    public function submit()
    {

        $this->validate();

        $this->nextStep();
    }

    public function stepInfo(): array
    {
        return [
            'label' => __('Enregistrement du Dossier'),
            'icon' => 'fa-shopping-cart',
        ];
    }

    public function render()
    {
        return view('livewire.portal.immatriculation-directe.steps.information-step');
    }
}
