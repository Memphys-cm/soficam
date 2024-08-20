<div>
    <x-alert />
    <div class='p-0'>
        <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
            <div class="mb-lg-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Paramètres du profil')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{__('Paramètres du profil ')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('Mettre à jour les détails de votre profil ')}} </p>
            </div>

        </div>
    </div>
    <div class='mb-3 mt-0'>
        <div class='row'>
            <div class='col-md-7'>
                <div class='card p-3 text-gray-700'>
                    <h5 class="pb-3">{{__('Détails personnels')}}</h5>
                    <x-form-items.form wire:submit="updateProfile" nctype="multipart/form-data" class="form-modal">
                        <div class="form-group mb-4 row">
                            <div class='col-md-6 col-xs-12'>
                                <label for="first_name">{{__('Prénom')}}</label>
                                <input wire:model="first_name" type="text" class="form-control  @error('first_name') is-invalid @enderror" value="{{auth()->user()->first_name}}" required="" name="first_name">
                                @error('first_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-6 col-xs-12'>
                                <label for="last_name">{{__('Nom')}}</label>
                                <input wire:model="last_name" type="text" class="form-control  @error('last_name') is-invalid @enderror" value="{{auth()->user()->last_name}}" required="" name="last_name">
                                @error('last_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4 row">
                            <div class='col-md-6 col-xs-12'>
                                <label for="matricule">{{__('Matricule')}}</label>
                                <input wire:model="matricule" type="text" class="form-control @error('matricule') is-invalid @enderror" value="{{auth()->user()->matricule}}" required="" name="matricule">
                                @error('matricule')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-6 col-xs-12'>
                                <label for="email">{{__('Email')}}</label>
                                <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{auth()->user()->email}}" required="" name="email">
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group mb-4 row">
                            <div class='col-md-6 col-xs-12'>
                                <label for="phone_number">{{__('Numéro de téléphone')}}</label>
                                <input wire:model="phone_number" type="text" class="form-control  @error('phone_number') is-invalid @enderror" value="{{auth()->user()->phone}}" name="phone_number">
                                @error('phone_number')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-6 col-xs-12'>
                                <label for="position">{{__('Position')}}</label>
                                <input wire:model="position" type="text" class="form-control  @error('position') is-invalid @enderror" autofocus="" name="position">
                                @error('position')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-4'>
                            <label for="preferred_language">{{__('Sélectionner la langue de notification préférée')}}</label>
                            <select wire:model="preferred_language" name="preferred_language" class="form-select  @error('preferred_language') is-invalid @enderror" required="">
                                <option value="">{{__('Sélectionner')}}</option>
                                <option value="en">{{__('Anglais')}}</option>
                                <option value="fr">{{__('Français')}}</option>
                            </select>
                            @error('preferred_language')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" wire:click.prevent="updateProfile" class="btn btn-primary btn-loading">{{__('Mettre à jour')}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
            <div class='col-md-5'>
                <div class='card p-3 text-gray-700'>
                    <h5 class="pb-3">{{__('Téléchargement de la signature')}} <br>
                        <small class="text-muted fw-light fs-6 fst-italic">{{__('Télécharger la signature sur fond transparent/blanc')}} <a href='https://www.signwell.com/online-signature/draw/' target="_blank">{{__("check here!")}}</a> </small>
                    </h5>

                    <x-form-items.form wire:submit="saveSignature" enctype="multipart/form-data" class="form-modal">
                        <div class="form-group mb-4">
                            <input type="file" wire:model="signature" class="form-control @error('signature') is-invalid @enderror" />
                            @error('signature')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        @if(!is_null(auth()->user()->signature_path))
                        <div class="form-group mb-4">
                            <label>{{__('Signature actuelle')}}</label>
                            <div class="w-25 h-25">
                                <img src='{{ asset("storage/" . auth()->user()->signature_path) }}' alt='Signature' class="img-fluid rounded">
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="submit" wire:click.prevent="saveSignature" class="btn btn-primary btn-loading">{{__('Upload signature')}} </button>
                            </div>
                        </div>
                    </x-form-items.form>
                </div>

                <div class='card p-3 text-gray-700 mt-3'>
                    <h5 class="pb-3">{{__('Réinitialisation du mot de passe')}}</h5>
                    <x-form-items.form wire:submit="passwordReset" nctype="multipart/form-data" class="form-modal">
                        <div class='form-group mb-4'>
                            <label for="current_password">{{__('Mot de passe actuel')}}</label>
                            <input wire:model="current_password" type="text" class="form-control  @error('current_password') is-invalid @enderror">
                            @error('current_password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class='form-group row mb-4'>
                            <div class='col-md-6 col-xs-12'>
                                <label for="password">{{__('Nouveau Mot de passe')}}</label>
                                <input wire:model="password" type="text" class="form-control  @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-6 col-xs-12'>
                                <label for="password_confirmation">{{__('Confirmer mot de passe')}}</label>
                                <input wire:model="password_confirmation" type="text" class="form-control  @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" wire:click.prevent="passwordReset" class="btn btn-primary btn-loading">{{__('Réinitialiser le mot de passe')}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
