<div>
    <div class='container pt-3 pt-lg-4 pb-4 pb-lg-3 text-white'>
        <div class='d-flex flex-wrap align-items-center  justify-content-between '>
            <a href="{{route('user.dashboard')}}" sclass="">
                <svg class="icon me-1 text-gray-700 bg-gray-300 rounded-circle p-2" style="height : 2.5rem;" fill="none" stroke="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <x-navigation.user-nav />
            </div>
        </div>
        <div class='d-flex flex-wrap justify-content-between align-items-center pt-3'>
            <div class=''>
                <h1 class='fw-bold display-4 text-gray-600 d-inline-flex align-items-end'>
                    <svg class="icon icon-md me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span>
                        {{__('Paramètres du profil')}}
                    </span>
                </h1>
                <p class="text-gray-800">{{__('Mettre à jour votre profil')}} </p>
            </div>
            <div class=''>

            </div>
        </div>
        <x-alert />
        <div class='mb-3 mt-0'>
            <div class='row'>
                <div class='col-md-6'>
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
                                    <label for="phone_number">{{__('Numero de téléphone')}}</label>
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
                                    <option value="">{{__('Sélectionner statut')}}</option>
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
                <div class='col-md-6'>
                    <div class='card p-3 text-gray-700'>
                        <h5 class="pb-3">{{__('Téléchargement de la signature')}} <br>
                            <small class="text-muted fw-light fs-6 fst-italic">{{__('Télécharger la signature sur fond transparent/blanc')}} <a href='https://www.signwell.com/online-signature/draw/' target="_blank">{{__("choisir ici!")}}</a> </small>
                        </h5>

                        <x-form-items.form wire:submit="saveSignature" nctype="multipart/form-data" class="form-modal">
                            <div class="form-group mb-4">
                                <input type="file" wire:model="signature" class="form-control  @error('signature') is-invalid @enderror" />
                                @error('signature')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                @if(!is_null(auth()->user()->signature_path))
                                <div class="w-25 h-25">
                                    <img src='{{asset("storage/attachments/".auth()->user()->signature_path)}}' alt=''>
                                </div>
                                @endif
                                <div>
                                    <button type="submit" wire:click.prevent="saveSignature" class="btn btn-gray-300 text-gray-500 btn-loading">{{__('Téléverser signature')}} </button>
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
                                <button type="submit" wire:click.prevent="passwordReset" class="btn btn-gray-300 text-gray-500 btn-loading">{{__('Réinitialiser le mot de passe')}} </button>
                            </div>
                        </x-form-items.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>