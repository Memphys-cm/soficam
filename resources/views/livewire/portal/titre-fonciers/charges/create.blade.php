<div wire:ignore.self class="modal side-layout-modal fade" id="CreateChargeModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Ajouter')}}{{__(' Nouvelle Charge sur Titre foncier')}}</h1>
                        <p class="px-1"> {{__('Charge sur Titre foncier')}} </p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class='form-group  mb-2'>
                            <label for="titre_foncier_id">{{ __('Numéro Titre Foncier') }}</label>
                            <x-input.land_title-select wire:model="titre_foncier_id" prettyname="titre_foncier" :options="$titre_fonciers" />
                            @error('titre_foncier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(!empty($titre_foncier_users))
                        <span class="fw-bold py-2">{{__('Propriétaires')}}</span>
                        <div class='row'>
                            @foreach($titre_foncier_users->split($titre_foncier_users->count()) as $row )
                            <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
                                @foreach($row as $user)
                                <a href="#" class="d-flex align-items-center  py-1">
                                    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2"><span class="text-white">{{$user->initials}}</span></div>
                                    <div class="d-block">
                                        <span class="fw-bolder ">{{ucwords($user->name)}}</span>
                                        <div class="small text-gray">
                                            <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg> {{$user->primary_phone_number}}
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @endif
                        
                        <div class="form-group mb-2 row">
                            <div class="col">
                                <label for="etat_TF">{{__('Type de Charge')}}</label>
                                <select wire:model="etat_TF" name="etat_TF" class="form-select  @error('etat_TF') is-invalid @enderror" required="">
                                    <option value="">{{__('Selectionner le Type de Charge')}}</option>
                                    <option value="HYPOTHEQUE">{{__('HYPOTHEQUE')}}</option>
                                    <option value="PRENOTE">{{__('PRENOTE')}}</option>
                                    <option value="SUSPENDU">{{__('SUSPENDU')}}</option>
                                    <option value="ANNULATION">{{__('ANNULATION')}}</option>
                                </select>
                                @error('etat_TF')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="p-3 shadow border rounded my-2">
                                <h2 class="h5 mb-4">{{__('Attacher Documents')}}</h2>
                                <div class="d-xl-flex align-items-center">
                                    <div class="file-field">
                                        <div class="d-flex justify-content-xl-center ms-xl-3">
                                            <div class="d-flex"><svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
                                                </svg>
                                                <input type="file" class="form-control-file" wire:model="attachements">
                                                <div class="d-md-block text-left">
                                                    <div class="fw-normal text-dark mb-1">{{__('Choisir les fichiers')}}</div>
                                                    <div class="text-gray small">JPG,PNG, PDF, Word,Excel. Taille max 50MB</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-5">
                                <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                                <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Créer')}}</button>
                            </div>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>