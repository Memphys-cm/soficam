<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUserModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Créer Utilisateur')}}</h1>
                        <p class="px-1"> {{__('Créer un nouvel Utilisateur')}}</p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class='form-group row mb-3'>
                            <div class='col'>

                                <label class="px-2" for="service_id">{{__('Services')}}</label>
                                <select wire:model="service_id" name="service_id" class="form-select  @error('service_id') is-invalid @enderror" required="">
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->service_name}}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="role_name">{{__('Rôle')}}</label>
                                <select wire:model="role_name" name="role_name" class="form-select  @error('role_name') is-invalid @enderror" required="">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="first_name">{{ __('Prénom') }}</label>
                                <input type="text" wire:model="first_name" class="form-control  @error('first_name') is-invalid @enderror " value="{{ old('first_name') }}" placeholder="Jane" id="first_name" autofocus="" required="">
                                @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="last_name">{{ __('Nom') }}</label>
                                <input type="text" wire:model="last_name" class="form-control  @error('last_name') is-invalid @enderror " value="{{ old('last_name') }}" placeholder="Doe" id="last_name" autofocus="" required="">
                                @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="id_card_number">{{ __('Numéro CNI') }}</label>
                                <input type="text" wire:model="id_card_number" class="form-control  @error('id_card_number') is-invalid @enderror " value="{{ old('id_card_number') }}" placeholder="112233445566" id="id_card_number" autofocus="" required="">
                                @error('id_card_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="date_of_birth">{{ __('Date de Naissance') }}</label>
                                <input type="date" wire:model="date_of_birth" class="form-control  @error('date_of_birth') is-invalid @enderror " value="{{ old('date_of_birth') }}" placeholder="Edea" id="date_of_birth" autofocus="" required="">
                                @error('date_of_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3"><label for="place_of_birth">{{ __('Lieu de naissance') }}</label>
                            <input type="text" wire:model="place_of_birth" class="form-control  @error('place_of_birth') is-invalid @enderror " value="{{ old('place_of_birth') }}" placeholder="Edea" id="place_of_birth" autofocus="" required="">
                            @error('place_of_birth')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="primary_phone_number">{{ __('N° de téléphone principal') }}</label>
                                <input type="text" wire:model="primary_phone_number" class="form-control  @error('primary_phone_number') is-invalid @enderror " value="{{ old('primary_phone_number') }}" placeholder="6xxxxxxxx" id="primary_phone_number" autofocus="" required="">
                                @error('primary_phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="secondary_phone_number">{{ __('Autre numéro de téléphone') }}</label>
                                <input type="text" wire:model="secondary_phone_number" class="form-control  @error('secondary_phone_number') is-invalid @enderror " value="{{ old('secondary_phone_number') }}" placeholder="Doe" id="secondary_phone_number" autofocus="" required="">
                                @error('secondary_phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="address">{{ __('Adresse') }}</label>
                                <input type="text" wire:model="address" class="form-control  @error('address') is-invalid @enderror " value="{{ old('address') }}" placeholder="{{__('Carefour Eto')}}" id="address" autofocus="" required="">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="email">{{ __('Adresse Email ') }}</label>
                                <input type="email" wire:model="email" class="form-control  @error('email') is-invalid @enderror " value="{{ old('email') }}" placeholder="jane.doe@app.com" id="email" autofocus="" required="">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-4'>
                            <div class=" col"><label for="password">{{ __('Mot de passe') }}</label>
                                <input type="password" wire:model="password" class="form-control  @error('password') is-invalid @enderror " autofocus="" required="">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="password_confirmation">{{ __('Confirmer mot de passe') }}</label>
                                <input type="password" wire:model="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror " id="password_confirmation" autofocus="" required="">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-4 px-1'>
                            <div class="form-check">
                                <input class="form-check-input {{$this->is_active ? 'checked': ''}} " type="checkbox" value="" wire:model="is_active" id="is_active">
                                <label class="form-check-label mb-0" for="is_active">{{ __('Marquer comme actif') }}</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary" wire:loading.attr="disabled">{{__('Créer')}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>