<div>
    <div class="container my-5 mx-2 rounded" style="background: white;">
        <div class="row g-4">
            <!-- Référence -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-upc-scan display-6 text-success"></i>
                    </div>
                    <h5 class="fw-bold">{{__('Référence')}}</h5>
                    <p class="mb-0">{{ $imma_directe->reference }}</p>
                </div>
            </div>

            <!-- Superficie -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-arrows-fullscreen display-6 text-success"></i>
                    </div>
                    <h5 class="fw-bold">{{__('Superficie')}}</h5>
                    <p class="mb-0">{{ $imma_directe->superficie }} m2</p>
                </div>
            </div>

            <!-- Localisation -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-geo-alt display-6 text-info"></i>
                    </div>
                    <h5 class="fw-bold">{{__('Localisation')}}</h5>
                    <p class="mb-0">{{ $imma_directe->localisation }}</p>
                </div>
            </div>

            <!-- Région -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary text-danger">
                        <i class="bi bi-geo display-6"></i>
                    </div>
                    <h5 class="fw-bold">{{__('Région')}}</h5>
                    <p class="mb-0">{{ $imma_directe->region->region_name_fr }}</p>
                </div>
            </div>

            <!-- Zone -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-pin-map display-6 text-danger"></i>
                    </div>
                    <h5 class="fw-bold">Zone</h5>
                    <p class="mb-0">{{ $imma_directe->zone }}</p>
                </div>
            </div>

            <!-- État du Terrain -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-card-checklist display-6 text-secondary"></i>
                    </div>
                    <h5 class="fw-bold">{{__('État du Terrain')}}</h5>
                    <p class="mb-0">{{ $imma_directe->etat_terrain }}</p>
                </div>
            </div>

            <!-- Source du Terrain -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-file-earmark display-6 text-info"></i>
                    </div>
                    <h5 class="fw-bold">{{__('Source du Terrain')}}</h5>
                    <p class="mb-0">{{ $imma_directe->source_terrain }}</p>
                </div>
            </div>

            <!-- Division -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-building display-6 text-info"></i>
                    </div>
                    <h5 class="fw-bold">Division</h5>
                    <p class="mb-0">{{ $imma_directe->division->division_name_fr }}</p>
                </div>
            </div>

            <!-- Sub-division -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-building display-6 text-info"></i>
                    </div>
                    <h5 class="fw-bold">Sub-division</h5>
                    <p class="mb-0">{{ $imma_directe->subDivision->sub_division_name_fr }}</p>
                </div>
            </div>
            <!-- Statut -->
            <div class="col-12">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-bookmark-star display-6 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">Coordonnees</h5>
                    <p class="mb-0">
                        @foreach(collect(json_decode($imma_directe->coordonnees,true)) as $key => $value)
                        <div class="d-flex align-items-centerpy-1">
                            <span class="fw-bolder mx-2"> {{ $key }} :</span> {{ $value}}
                        </div>
                        @endforeach
                    </p>
                </div>
            </div>

            <!-- Statut -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-bookmark-star display-6 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">{{__('Statut')}}</h5>
                    <p class="mb-0">
                        <span class="badge bg-{{ $imma_directe->StatutStyle }}">{{ $imma_directe->statut }}</span>
                    </p>
                </div>
            </div>

            <!-- Prochaine Étape -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-arrow-right-circle display-6 text-info"></i>
                    </div>
                    <h5 class="fw-bold">{{__('Prochaine Étape')}}</h5>
                    <p class="mb-0 badge bg-primary">{{ $imma_directe->next_step }}</p>
                </div>
            </div>

            @error('service_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Bouton Modifier -->
            <div class="col-12 d-flex justify-content-end mt-4">
                <button class="btn btn-primary my-2" wire:click="nextStep">
                    {{ __('Suivant') }}
                </button>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-start ms-2">
    </div>
</div>
