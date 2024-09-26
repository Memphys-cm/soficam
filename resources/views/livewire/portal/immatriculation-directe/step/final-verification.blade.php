<div class="container shadow p-2 my-3">
    <h1 class="mb-4">{{__('Étapes d\'Immatriculation')}}</h1>

    <div class="row">
        <!-- Étape 1 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-info-circle"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Référence')}}</h5>
                    <p class="step-description"> {{ $imma_directe->reference }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 2 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-map-marker-alt"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Localisation')}}</h5>
                    <p class="step-description"> {{ $imma_directe->localisation }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 3 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-globe"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Région')}}</h5>
                    <p class="step-description"> {{ $imma_directe->region_id }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 4 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-cogs"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Service')}}</h5>
                    <p class="step-description"> {{ $imma_directe->service_id }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 5 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-calendar-check"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Date de Délivrance')}}</h5>
                    <p class="step-description">
                        {{ is_string($imma_directe->date_delivrance) ? $imma_directe->date_delivrance : ($imma_directe->date_delivrance ? \Carbon\Carbon::parse($imma_directe->date_delivrance)->format('d/m/Y') : 'Non spécifiée') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Étape 6 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-calendar-day"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Date de Cotation')}}</h5>
                    <p class="step-description">
                        {{ is_string($imma_directe->date_cotation) ? $imma_directe->date_cotation : ($imma_directe->date_cotation ? \Carbon\Carbon::parse($imma_directe->date_cotation)->format('d/m/Y') : 'Non spécifiée') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Étape 7 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-file-alt"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Ordre de Versement')}}</h5>
                    <p class="step-description"> {{ $imma_directe->numero_ordre_versement }} - {{ $imma_directe->montant_ordre_versement }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 8 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-bullhorn"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Avis Public')}}</h5>
                    <p class="step-description"> {{ $imma_directe->status_avis_publique }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 9 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-users"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Convocation')}}</h5>
                    <p class="step-description"> {{ $imma_directe->status_convocation }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 10 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-file-signature"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Documents Techniques')}}</h5>
                    <p class="step-description">
                        {{ is_string($imma_directe->dossier_technique_complet) ? $imma_directe->dossier_technique_complet : ($imma_directe->dossier_technique_complet ? \Carbon\Carbon::parse($imma_directe->dossier_technique_complet)->format('d/m/Y') : 'Non spécifiée') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Étape 11 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-check-circle"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Validation Finale')}}</h5>
                    <p class="step-description"> {{ $imma_directe->is_complete ? 'Complet' : 'Non complet' }} </p>
                </div>
            </div>
        </div>

        <!-- Étape 12 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-calendar-check"></i>
                <div class="ms-3">
                    <h5 class="step-title">{{__('Finalisation')}}</h5>
                    <p class="step-description">
                        {{ is_string($imma_directe->date_finalisation) ? $imma_directe->date_finalisation : ($imma_directe->date_finalisation ? \Carbon\Carbon::parse($imma_directe->date_finalisation)->format('d/m/Y') : 'Non spécifiée') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Étape 13 -->
        <div class="col-md-6 step-item">
            <div class="d-flex align-items-start">
                <i class="step-icon fas fa-info-circle"></i>
                <div class="ms-3">
                    <h5 class="step-title">Observations</h5>
                    <p class="step-description"> {{ $imma_directe->observation_cotation }} </p>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-end"> 
            <button class="btn btn-primary" wire:click="dossier_approbation_final">
                {{__('Approbation du dossier')}} </button>
            </div>

    </div>
</div>
