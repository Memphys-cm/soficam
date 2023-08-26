<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Steps;


use App\Support\OrderWizardState;
use Spatie\LivewireWizard\Components\WizardComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape2\SecondComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\OdreVersementComponent;

class ImmaStepComponent extends WizardComponent
{
    public function steps(): array
    {
        return [
            OdreVersementComponent::class,
            SecondComponent::class,
        ];
    }

    // public function stateClass(): string
    // {
    //     return OrderWizardState::class;
    // }
}
