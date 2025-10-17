<div>

    @include('livewire.portal.immatriculation-directe.navigation')

    <div class="container my-5 mx-2 rounded" style="background: white;">
        <div class="row g-4">
            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-upc-scan display-6"></i>
                    </div>
                    <h5 class="fw-bold">Référence</h5>
                    <p class="mb-0">{{ $imma_directe->reference }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-arrows-fullscreen display-6"></i>
                    </div>
                    <h5 class="fw-bold">Superficie</h5>
                    <p class="mb-0">{{ $imma_directe->superficie }} m2</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-geo-alt display-6"></i>
                    </div>
                    <h5 class="fw-bold">Localisation</h5>
                    <p class="mb-0">{{ $imma_directe->localisation }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-geo display-6"></i>
                    </div>
                    <h5 class="fw-bold">Région</h5>
                    <p class="mb-0">{{ $imma_directe->region->region_name_fr }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-pin-map display-6"></i>
                    </div>
                    <h5 class="fw-bold">Zone</h5>
                    <p class="mb-0">{{ $imma_directe->zone }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-card-checklist display-6"></i>
                    </div>
                    <h5 class="fw-bold">État du Terrain</h5>
                    <p class="mb-0">{{ $imma_directe->etat_terrain }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-file-earmark display-6"></i>
                    </div>
                    <h5 class="fw-bold">Source du Terrain</h5>
                    <p class="mb-0">{{ $imma_directe->source_terrain }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-building display-6"></i>
                    </div>
                    <h5 class="fw-bold">Division</h5>
                    <p class="mb-0">{{ $imma_directe->division->division_name_fr }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-building display-6"></i>
                    </div>
                    <h5 class="fw-bold">Sub-division</h5>
                    <p class="mb-0">{{ $imma_directe->subDivision->sub_division_name_fr }}</p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-bookmark-star display-6"></i>
                    </div>
                    <h5 class="fw-bold">Statut</h5>
                    <p class="mb-0">
                        <span class="badge bg-{{ $imma_directe->StatutStyle }}">{{ $imma_directe->statut }}</span>
                    </p>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-arrow-right-circle display-6"></i>
                    </div>
                    <h5 class="fw-bold">Prochaine Étape</h5>
                    <p class="mb-0 badge bg-primary">{{ $imma_directe->next_step }}</p>
                </div>
            </div>

            @error('service_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            
            <div class="col-12 d-flex justify-content-end mt-4">
                <button class="btn btn-primary my-2" wire:click="submit">
                    {{ __('Suivant') }}
                </button>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-start ms-2">
    </div>
</div>
