<div wire:ignore.self class="modal side-layout-modal fade" id="CreateMembreModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Membre du Cabinet') }}</h1>
                        <p class="px-1"> {{ __('Créer Membre du Cabinet') }} </p>
                    </div>
                    <x-form-items.form wire:submit="store">


                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="first_name">{{ __('Prénom*') }}</label>
                                <input type="text" wire:model="first_name" class="form-control  @error('first_name') is-invalid @enderror " value="{{ old('first_name') }}" id="first_name" autofocus="" required="">
                                @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="last_name">{{ __('Nom*') }}</label>
                                <input type="text" wire:model="last_name" class="form-control  @error('last_name') is-invalid @enderror " value="{{ old('last_name') }}" id="last_name" autofocus="" required="">
                                @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row mb-3'>

                            <div class=" col"><label for="cabinet_id">{{ __('Cabinet*') }}</label>
                                <x-input.select wire:model="cabinet_id" prettyname="cabinet" :options="$cabinets->pluck('nom_cabinet', 'id')->toArray()" selected="('cabinet_id')" />
                                @error('cabinet_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" col"><label for="post">{{ __('Poste') }}</label>
                                <input type="text" wire:model="post" class="form-control  @error('post') is-invalid @enderror " value="{{ old('post') }}" id="post" autofocus="" required="">
                                @error('post')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="address">{{ __('Adresse') }}</label>
                                <input type="text" wire:model="address" class="form-control  @error('address') is-invalid @enderror " value="{{ old('address') }}" id="address" autofocus="" required="">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class=" col"><label for="phone_number">{{ __('Numéro de téléphone') }}</label>
                                <input type="text" wire:model="phone_number" class="form-control  @error('phone_number') is-invalid @enderror " value="{{ old('phone_number') }}" id="phone_number" autofocus="" required="">
                                @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="type_membre">{{__('Type Membre')}}</label>
                                <select wire:model="type_membre" name="type_membre" class="form-select  @error('type_membre') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Sélectionner Type Membre --')}}</option>
                                    <option value="geometre">{{__('Géomètre')}}</option>
                                    <option value="lotisseur">{{__('Lotisseur')}}</option>
                                    <option value="maeture">{{__('Maeture')}}</option>
                                    <option value="promoteur_immobiliere">{{__('Promoteur Immobilier')}}</option>
                                    <option value="agent_immobiliere">{{__('Agent Immobilier')}}</option>
                                    <option value="urbaniste">{{__('Urbaniste')}}</option>
                                    <option value="controlleur">{{__('Contrôleur')}}</option>
                                    <option value="notaire">{{__('Notaire')}}</option>
                                </select>
                                @error('type_membre')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" class="btn btn-primary btn-loading">{{ __('Modifier')}}</button>
                        </div>
                    </x-form-items.form>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- update modal --}}
<div wire:ignore.self class="modal side-layout-modal fade" id="EditMembeModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Mettre à jour un notaire') }}</h1>
                        <p class="px-1"> {{ __('Mettre à jour les informations sur le notaire') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="update">


                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="first_name">{{ __('Prénom*') }}</label>
                                <input type="text" wire:model="first_name" class="form-control  @error('first_name') is-invalid @enderror " value="{{ old('first_name') }}" id="first_name" autofocus="" required="">
                                @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="last_name">{{ __('Nom*') }}</label>
                                <input type="text" wire:model="last_name" class="form-control  @error('last_name') is-invalid @enderror " value="{{ old('last_name') }}" id="last_name" autofocus="" required="">
                                @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row mb-3'>

                            <div class=" col"><label for="cabinet_id">{{ __('Cabinet*') }}</label>
                                <x-input.select wire:model="cabinet_id" prettyname="cabinet" :options="$cabinets->pluck('nom_cabinet', 'id')->toArray()" selected="('cabinet_id')" />
                                @error('cabinet_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" col"><label for="post">{{ __('Poste') }}</label>
                                <input type="text" wire:model="post" class="form-control  @error('post') is-invalid @enderror " value="{{ old('post') }}" id="post" autofocus="" required="">
                                @error('post')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="address">{{ __('Adresse') }}</label>
                                <input type="text" wire:model="address" class="form-control  @error('address') is-invalid @enderror " value="{{ old('address') }}" id="address" autofocus="" required="">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class=" col"><label for="phone_number">{{ __('Numéro de téléphone') }}</label>
                                <input type="text" wire:model="phone_number" class="form-control  @error('phone_number') is-invalid @enderror " value="{{ old('phone_number') }}" id="phone_number" autofocus="" required="">
                                @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="type_membre">{{__('Type Membre')}}</label>
                                <select wire:model="type_membre" name="type_membre" class="form-select  @error('type_membre') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Sélectionner --')}}</option>
                                    <option value="geomtre">{{__('Géomètre')}}</option>
                                    <option value="notaire">{{__('Notaire')}}</option>
                                </select>
                                @error('type_membre')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>


                        <br>


                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" class="btn btn-primary btn-loading">{{ __('Mettre à jour')}}</button>
                        </div>
                    </x-form-items.form>

                </div>
            </div>
        </div>
    </div>
</div>