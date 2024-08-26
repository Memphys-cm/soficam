<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Cotation\CotationCsdafStep;
use Spatie\LivewireWizard\Components\WizardComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\InformationStep;


class CheckoutWizardComponent extends WizardComponent
{

    public $imma_direct_id;

    public function mount(string $imma_direct_id)
    {
        $this->imma_direct_id = $imma_direct_id;
        // dd($this->evaluation_id);
    }


    public function initialState(): array
    {
        $components = [
            'imma_direct-information-step',
            'imma_direct-cotation_csdaf-step',
        ];

        return collect($components)->mapWithKeys(function ($component) {
            return [$component => ['imma_direct_id' => $this->imma_direct_id]];
        })->toArray();
    }

    public function steps(): array
    {
        return [
            InformationStep::class,
            CotationCsdafStep::class,
        ];
    }

    // public function render()
    // {
    //     return view('livewire.client.evaluation.check-wizard-component');
    // }
}
