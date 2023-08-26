<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape2;

use Spatie\LivewireWizard\Components\StepComponent;

class SecondComponent extends StepComponent
{
    public $amount = 1;

    public array $rules = [
        'amount'=> ['numeric', 'min:1', 'max:5'],
    ];

    public function submit()
    {
        $this->validate();

        // $this->nextStep();
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Second',
        ];
    }

    public function render()
    {
        return view('livewire.portal.immatriculation-directe.steps.etape2.second');
    }
}
