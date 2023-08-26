<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\ImmaStepComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape2\SecondComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\OdreVersementComponent;

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
        Livewire::component('imma_step', ImmaStepComponent::class);
        Livewire::component('ordre_versement', OdreVersementComponent::class);
        Livewire::component('second_component', SecondComponent::class);
    }
}
