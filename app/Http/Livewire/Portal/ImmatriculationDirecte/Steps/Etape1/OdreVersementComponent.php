<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1;

use Spatie\LivewireWizard\Components\StepComponent;

class OdreVersementComponent extends StepComponent
{
    public $amount = 1;

    public array $rules = [
        'amount'=> ['numeric', 'min:1', 'max:5'],
    ];

    public function submit()
    {
        $this->validate();

        $this->nextStep();
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Odre de Versement',
            'icon' => 'fa-shopping-cart',  
        ];
    }

    public function render()
    {
        return view('livewire.portal.immatriculation-directe.steps.etape1.ordre_versement');
    }
}
