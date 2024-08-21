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
                <span class="fw-bold mx-1"> étape en cours </span>
                <span class="mx-2 badge bg-warning">{{ $imma_directe->statut }}</span>
                <span class="fw-bold mx-1"> Prochaine étape </span>
                <span class="mx-2 badge bg-{{ $imma_directe->StatutStyle }}">{{ $imma_directe->next_step }}</span>
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
                                1 => __('1- Vérification des Droits Coutumiers'),
                                2 => __('2- Montage et Jumelage des Dossiers'),
                                3 => __('3- Vérification et Publication'),
                                4 => __('4- Finalisation du Dossier'),
                            ];
                        @endphp
                        <div class="d-flex justify-content-between align-items-center">
                            @foreach ($tabs as $tabIndex => $tabLabel)
                                @php
                                    // Vérifie si l'onglet doit être marqué comme complété (en vert)
                                    $isCompleted = false;

                                    switch ($tabIndex) {
                                        case 1:
                                            $isCompleted = $imma_directe->date_certificat_d_affichage_signer; // Toujours vert si date_certificat_d_affichage_signer existe
                                            break;
                                        case 2:
                                        case 3:
                                            $isCompleted = $imma_directe->dossier_administratif_complet;
                                            break;
                                        case 4:
                                            $isCompleted = $imma_directe->is_finalisation;
                                            break;
                                    }

                                    // Applique la classe appropriée
                                    $bgClass = $isCompleted ? 'bg-success text-white' : ($high_step == $tabIndex ? 'bg-secondary text-white shadow-lg' : 'bg-white text-muted');
                                @endphp

                                <div class="nav-link text-center py-2 px-4 rounded {{ $bgClass }} fw-bold text-sm mx-1"
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

        <!-- Navigation des étapes spécifiques -->
        <div class="col-12 col-md-4">
            <nav class="vertical-nav py-3" aria-label="Navigation des étapes">
                @php
                    // Définir les étapes spécifiques pour chaque high_step
                    $steps = [
                        1 => [
                            1 => __('1- Création du Dossier'),
                            2 => __('2- Cotation du Dossier au Csdaf'),
                            3 => __('3- Délivrance de l\'Ordre de Versement'),
                            4 => __(
                                '4- Changements de Statut après la Publication d’Avis et décision portant calendrier de descente sur le terrain'
                            ),
                            5 => __('5- Génération du Certificat d\'Affichage'),
                            6 => __('6- Changements de Statut liés au Certificat d\'Affichage'),
                        ],
                        2 => [
                            7 => __('7- Enregistrement de la Descente sur le Terrain'),
                            8 => __('8- Établissement de l\'État de Cession et Paiement'),
                            9 => __('9- Instruction de la Descente sur le Terrain'),
                            10 => __('10- Changement de Statut après la Descente sur le Terrain'),
                            11 => __('11- Mise à Jour du Dossier Technique'),
                            12 => __('12- Mise en Forme du Dossier Administratif'),
                        ],
                        3 => [
                            13 => __('13- Changements de Statut après Transmission'),
                            14 => __('14- Établissement du Bordereau de Transmission'),
                            15 => __('15- Changements de Statut après le Bordereau'),
                            16 => __('16- Production du Certificat Final'),
                        ],
                        4 => [
                            17 => __('17- Finalisation et Clôture du Dossier'),
                            18 => __('18- Vérification Finale'),
                            19 => __('19- Remise des Documents Officiels'),
                            20 => __('20- Archivage du Dossier'),
                        ],
                        // Ajouter des steps pour les autres high_steps si nécessaire
                    ];

                    // Logique de validation des étapes
                    $validations = [
                        1 => true, // Étape 1 est toujours colorée
                        2 => $imma_directe->date_cotation,
                        3 => $imma_directe->date_ordre_versement,
                        4 => $imma_directe->date_certificat_d_affichage_signer,
                        5 => $imma_directe->date_fin_certificat_d_affichage,
                        6 => $imma_directe->date_certificat_d_affichage_signer,
                        7 => $imma_directe->descente_terrain,
                        8 => $imma_directe->etat_cession,
                        9 => $imma_directe->dossier_technique_complet,
                        10 => $imma_directe->dossier_technique_complet,
                        11 => $imma_directe->dossier_technique_complet,
                        12 => $imma_directe->dossier_administratif_complet,
                        13 => $imma_directe->dossier_administratif_complet,
                    ];
                @endphp

                @foreach ($steps[$high_step] as $stepIndex => $stepLabel)
                    @php
                        $isCompleted = isset($validations[$stepIndex]) && $validations[$stepIndex];
                        $bgClass = $isCompleted ? 'bg-success text-white' : ($step == $stepIndex ? 'bg-secondary text-white shadow-lg' : 'bg-white text-muted');
                    @endphp

                    <div class="my-2 nav-link d-flex align-items-center justify-content-between position-relative py-2 px-3 rounded {{ $bgClass }} fw-bold text-sm mx-1"
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

        <!-- Content Section (9 columns) -->
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
                @elseif ($step == 5)
                    @include('livewire.portal.immatriculation-directe.step.certificat_affichage')
                @elseif ($step == 6)
                    @include('livewire.portal.immatriculation-directe.step.edit_statut')
                @elseif($step == 7)
                    @include('livewire.portal.immatriculation-directe.step.descente_terrain')
                @elseif($step == 8)
                    @include('livewire.portal.immatriculation-directe.step.etat_cession')
                @elseif($step == 10)
                    @include('livewire.portal.immatriculation-directe.step.edit_statut')
                @elseif($step == 11)
                    @include('livewire.portal.immatriculation-directe.step.mise_en_forme_dossier_technique')
                @elseif($step == 12)
                    @include('livewire.portal.immatriculation-directe.step.mise_en_forme_dossier_administratif')
                @elseif($step == 13)
                    @include('livewire.portal.immatriculation-directe.step.edit_statut')
                @elseif($step == 15)
                    @include('livewire.portal.immatriculation-directe.step.bordoreau_transmition')
                @endif
                <!-- Ajoutez d'autres conditions pour les étapes restantes -->
            </div>
        </div>
    </div>
</div>
