<div class="container-fluid">
    <x-alert />
    <nav aria-label="breadcrumb" class="py-1">
        <ol class="breadcrumb bg-white px-3 py-2 rounded-pill shadow-lg">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none text-secondary d-flex align-items-center">
                    <i class="bi bi-house-door-fill me-2"></i>
                    <span class="fw-semibold">Accueil</span>
                </a>
            </li>
            <li class="breadcrumb-item active text-primary d-flex align-items-center" aria-current="page">
                <i class="bi bi-journal-text me-2"></i>
                <span class="fw-bold">Immatriculation Directe : {{ $imma_directe->reference }}</span>

                @if (!$imma_directe)
                    <span class="badge bg-secondary ms-3 d-flex align-items-center">
                        <i class="bi bi-hourglass-split me-1"></i> Non commencé
                    </span>
                @elseif($imma_directe->is_complete === 0)
                    <span class="badge bg-warning text-dark ms-3 d-flex align-items-center">
                        <i class="bi bi-hourglass-split me-1"></i> Procédure En Cours ...
                    </span>
                @elseif($imma_directe->is_complete === 1)
                    <span class="badge bg-success ms-3 d-flex align-items-center">
                        <i class="bi bi-check-circle me-1"></i> Terminée
                    </span>
                @endif
            </li>
        </ol>
    </nav>
    <div class="row">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="horizontal-nav py-3" aria-label="Navigation des étapes">
                        @php
                            // Définir les onglets de navigation
                            $tabs = [
                                1 => __('Vérification des Droits Coutumiers'),
                                2 => __('Montage et Jumelage des Dossiers'),
                                3 => __('Vérification et Publication'),
                                4 => __('Finalisation du Dossier'),
                            ];
                        @endphp
                        <div class="d-flex justify-content-between align-items-center">
                            @foreach ($tabs as $tabIndex => $tabLabel)
                                <div class="nav-link text-center py-2 px-4 rounded {{ $high_step == $tabIndex ? 'bg-secondary text-white shadow-lg' : 'bg-white text-muted' }} fw-bold text-sm mx-1"
                                    style="transition: all 0.3s ease-in-out; cursor: pointer; font-size:14px;"
                                    wire:click="setHighStep({{ $tabIndex }})"
                                    onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.2)';"
                                    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                                    {{ $tabLabel }}
                                    @if (!$loop->last)
                                        <i class="bi bi-chevron-right mx-2"></i>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        
        <div class="col-12 col-md-4">
            <nav class="vertical-nav py-3" aria-label="Navigation des étapes">
                @php
                    // Définir les étapes spécifiques pour chaque high_step
                    $steps = [
                        1 => [
                            1 => __('Création du Dossier'),
                            2 => __('Cotation du Dossier au Csdaf'),
                            3 => __('Délivrance de l\'Ordre de Versement'),
                            4 => __('Changements de Statut après la Publication d’Avis et décision portant calendrier de descente sur le terrain'),
                            5 => __('Génération du Certificat d\'Affichage'),
                            6 => __('Changements de Statut liés au Certificat d\'Affichage'),
                        ],
                        2 => [
                            7 => __('Enregistrement de la Descente sur le Terrain'),
                            8 => __('Établissement de l\'État de Cession et Paiement'),
                            9 => __('Instruction de la Descente sur le Terrain'),
                            10 => __('Changement de Statut après la Descente sur le Terrain'),
                            11 => __('Mise à Jour du Dossier Technique'),
                            12 => __('Mise en Forme du Dossier Administratif'),
                        ],
                        3 => [
                            13 => __('Changements de Statut après Transmission'),
                            14 => __('Établissement du Bordereau de Transmission'),
                            15 => __('Changements de Statut après le Bordereau'),
                            16 => __('Production du Certificat Final'),
                        ],
                        // Ajouter des steps pour les autres high_steps si nécessaire
                    ];
                @endphp

                @foreach ($steps[$high_step] as $stepIndex => $stepLabel)
                    <div class="my-2 nav-link d-flex align-items-center justify-content-between position-relative py-2 px-3 rounded {{ $step == $stepIndex ? 'bg-secondary text-white shadow-lg' : 'bg-white text-muted' }} fw-bold text-sm mx-1"
                        style="transition: all 0.3s ease-in-out; cursor: pointer; font-size:14px;"
                        wire:click="setStep({{ $stepIndex }})"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.2)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                        {{ $stepLabel }}
                        @if (!$loop->last)
                            <i class="bi bi-chevron-right mx-2"></i>
                        @endif
                    </div>
                @endforeach
            </nav>
        </div>

        
        <div class="col-12 col-md-8">
            <div class="">
                @if ($step == 1)
                    @include('livewire.portal.immatriculation-directe.stepss.information-step')
                @elseif ($step == 2)
                    @include('livewire.portal.immatriculation-directe.stepss.cotation.cotation-csdaf-step')
                @elseif ($step == 3)
                    @include('livewire.portal.immatriculation-directe.stepss.ordre_versement')
                    @elseif ($step == 4)
                        @include('livewire.portal.immatriculation-directe.stepss.signature_avis_calendrier')
                @endif
                
            </div>
        </div>
    </div>
</div>
