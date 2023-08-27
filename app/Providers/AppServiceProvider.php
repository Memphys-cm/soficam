<?php

namespace App\Providers;

use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\AvisPubliqueComponent;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\ImmaStepComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape2\SecondComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\OdreVersementComponent;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Steps\Etape1\OrdreComponent;

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
    }
}
