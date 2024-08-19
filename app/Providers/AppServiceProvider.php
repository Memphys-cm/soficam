<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\Portal\ImmatriculationDirecte\CheckoutWizardComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Cotation\CotationCsdafStep;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\ImmaStepComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\OrdreComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape2\SecondComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\AvisPubliqueComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\OdreVersementComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\InformationStep;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Livewire::component('checkout-imma_direct-wizard', CheckoutWizardComponent::class);
        Livewire::component('imma_direct-information-step', InformationStep::class);
        Livewire::component('imma_direct-cotation_csdaf-step', CotationCsdafStep::class);
    }
}
