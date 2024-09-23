<div class="container-fluid mt-5">
    <div class="content-header">
        <h1>Enregistrez vos informations</h1>
        <p>Bienvenue sur le portail d'enregistrement des informations -- Certificat de propriété</p>
    </div>

    <div class="row mx-5">
        <!-- Left Side Card -->
        <div class="col-md-5">
            <div class="cert-card">
                <div class="position-absolute" style="top: -20px; left: -20px;">
                    <img src="{{ asset('img/favicon-et-192.png') }}" alt="Asterisk Icon" height="60">
                </div>
                <h4>CERTIFICAT DE PROPRIÉTÉ</h4>
                <h1>XAF {{ $amount }}</h1>
                <div class="stars">
                    <span class="icon-star">★</span><span class="icon-star">★</span><span
                        class="icon-star">★</span><span class="icon-star">★</span><span class="icon-star">★</span>
                </div>
                <p>À la fin de l'opération, un reçu vous sera délivré et un code que vous présenterez dans le
                    département ministériel pour impression et visa de votre service.</p>
                <p class="text-muted">Assurez-vous de copier le <span class="text-success">code unique généré</span>
                    après l'enregistrement de la demande.</p>
            </div>
        </div>

        <!-- Right Side Form -->
        <div class="col-md-7">
            <div class="form-section">
                <h5>Entrez vos informations</h5>
                <p><small class="text-danger">*** Tous les champs marqués avec l'astérisque (*) sont obligatoires
                        ***</small></p>

                <x-form-items.form wire:submit="store">
                    <!-- First Row -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="qualification">Qualification*</label>
                            <select class="form-control" wire:model="qualification" id="qualification" required>
                                <option value="" disabled selected>-- Sélectionner --</option>
                                <option value="personne_physique">Personne physique</option>
                                <option value="personne_morale">Personne morale</option>
                            </select>
                            @error('qualification')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="region">Région*</label>
                            <select wire:model="region_id" name="region_id"
                                class="form-select  @error('region_id') is-invalid @enderror" required="">
                                <option value="">{{ __('--Sélectionner--') }}</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                @endforeach
                            </select>
                            @error('region_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departement">Département*</label>
                            <select wire:model="division_id" name="division_id"
                                class="form-select @error('division_id') is-invalid @enderror" required="">
                                <option value="">{{ __('--Sélectionner--') }}</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                @endforeach
                            </select>
                            @error('division_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="conservation">Conservation Foncière*</label>
                            <select wire:model="conservation_id" name="conservation_id"
                                class="form-select  @error('conservation_id') is-invalid @enderror" required="">
                                <option value="">{{ __('--Sélectionner--') }}</option>
                                @foreach ($conservations as $conservation)
                                    <option value="{{ $conservation->id }}">{{ $conservation->conservation_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('conservation_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="titre_foncier">{{ __('Numéro du titre foncier') }} *</label>
                            <input type="text" class="form-control mb-3" wire:model="titre_foncier"
                                placeholder="Numéro du titre foncier">
                            @error('titre_foncier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="nom">{{ __('Nom/Raison Sociale') }}</label>
                            <input type="text" class="form-control mb-3" wire:model="nom"
                                placeholder="Nom/Raison Sociale">
                        </div>
                        <div class="col-md-6">
                            <label for="prenom">{{ __('Prénom') }}</label>
                            <input type="text" class="form-control mb-3" wire:model="prenom" placeholder="Prénom">
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control mb-3" wire:model="profession"
                                placeholder="Profession">
                        </div>
                        <div class="col-md-6">
                            <label for="motifs">Motifs</label>
                            <input type="text" class="form-control mb-3" wire:model="motifs" placeholder="Motifs">
                        </div>
                    </div>

                    <!-- Third Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="telephone">Téléphone</label>
                            <input type="text" class="form-control mb-3" wire:model="telephone"
                                placeholder="Téléphone">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mb-3" wire:model="email" placeholder="Email">
                        </div>
                    </div>

                    <!-- Fourth Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="localisation">Localisation de la parcelle</label>
                            <input type="text" class="form-control mb-3" wire:model="localisation"
                                placeholder="Localisation de la parcelle">
                        </div>
                        <div class="col-md-6">
                            <label for="identifiant">Numéro d'identifiant unique</label>
                            <input type="text" class="form-control mb-3" wire:model="identifiant"
                                placeholder="Numéro d'identifiant unique">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" wire:click.prevent="store" wire:loading.attr="disabled"
                        class="btn btn-success">Soumettre la Demande</button>

                </x-form-items.form>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        /* Top navigation and header */
        .navbar-custom {
            margin-top: 20px;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #222;
        }

        p {
            font-size: 16px;
            color: #666;
        }

        .content-header {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Card styles for the left side */
        .cert-card {
            background: linear-gradient(180deg, rgba(254, 238, 252, 1) 0%, rgba(247, 247, 255, 1) 100%);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            position: relative;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        }

        .cert-card h4 {
            font-size: 24px;
            color: #8e44ad;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .cert-card h1 {
            font-size: 72px;
            color: #6a1b9a;
            font-weight: 700;
        }

        .cert-card .stars {
            color: #2ecc71;
            margin: 20px 0;
        }

        .cert-card p {
            color: #333;
            margin-bottom: 0;
        }

        .cert-card .text-muted {
            font-size: 12px;
        }

        .icon-star {
            font-size: 14px;
            color: #f39c12;
        }

        /* Form styles on the right */
        .form-section {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        }

        .form-section h5 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .form-section p {
            font-size: 14px;
        }

        .form-section label {
            font-weight: 500;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 12px 15px;
        }

        .btn-success {
            width: 100%;
            border-radius: 10px;
            background-color: #6a1b9a;
            border-color: #6a1b9a;
            font-size: 16px;
            padding: 12px 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cert-card {
                margin-bottom: 30px;
            }
        }
    </style>
</div>
