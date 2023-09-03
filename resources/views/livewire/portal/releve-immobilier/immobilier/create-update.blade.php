{{-- create modal --}}
<div wire:ignore.self class="modal side-layout-modal fade" id="createimmobilierModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Créer') }}{{ __(' Relevé Immobilier') }}</h1>
                        <p class="px-1"> {{ __('Relevé Immobilier') }} </p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class="form-group mb-2 row">
                            <label for="titre_foncier_id">{{__('Numéro Titre Foncier')}}</label>
                            <x-input.select wire:model="titre_foncier_id" prettyname="titre_foncier_id" :options="$titrefoncier->pluck('numero_titre_foncier', 'id')->toArray()" />
                            @error('titre_foncier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-2 row">
                            <div class='col'>
                                <label class="px-2" for="requestor_id">{{ __('Requérant') }}</label>
                                <x-input.select wire:model="requestor_id" prettyname="requestor" :options="$requestors->pluck('first_name', 'id')->toArray()" />
                                @error('user_ids')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="releves_type">{{ __('Type Personne') }}</label>
                                <select wire:model="releves_type" name="releves_type"
                                    class="form-select  @error('releves_type') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner --') }}</option>
                                    <option value="personne_physique">{{ __('Personne Physique') }}</option>
                                    <option value="personne_morale">{{ __('Personne Morale') }}</option>
                                </select>
                                @error('releves_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="price">{{ __('Prix') }}</label>
                                <input wire:model="price" type="number" class="form-control  @error('price') is-invalid @enderror" placeholder="{{ __('') }}" required="">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="releve_number">{{ __('Numéro du relevé') }}</label>
                                <input wire:model="releve_number" type="text" class="form-control  @error('releve_number') is-invalid @enderror" placeholder="{{ __('1986') }}" required="">
                                @error('releve_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="releve_reason">{{ __('Raison du Relevé Immo') }}</label>
                                <textarea rows="3" wire:model="releve_reason" class="form-control @error('releve_reason') is-invalid @enderror" id="releve_reason" autofocus="" required=""></textarea>
                                @error('releve_reason')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Créer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- update modal --}}
<div wire:ignore.self class="modal side-layout-modal fade" id="updateimmobilierModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Mise à jour du Relevé Immobilier') }}</h1>
                        <p class="px-1"> {{ __('Mise à jour du Relevé Immobilier') }} </p>
                    </div>
                    <x-form-items.form wire:submit="update">
                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="type">{{ __('Type') }}</label>
                                <select wire:model="type" name="type" class="form-select  @error('type') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner --') }}</option>
                                    <option value="immobilier">{{ __('Immobilier') }}</option>
                                    <option value="bien_immobilier">{{ __('Bien Immobilier') }}</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="releve_number">{{ __('Numéro Relevé') }}</label>
                                <input wire:model="releve_number" type="text"
                                    class="form-control  @error('releve_number') is-invalid @enderror"
                                    placeholder="{{ __('1986') }}" required="">
                                @error('releve_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mb-2 row">
                            <div class='col'>
                                <label class="px-2" for="requestor_id">{{ __('Requérant') }}</label>
                                <x-input.select wire:model="requestor_id" prettyname="requestor" :options="$requestors->pluck('first_name', 'id')->toArray()" />
                                @error('user_ids')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="releves_type">{{ __(' Type Personne') }}</label>
                                <select wire:model="releves_type" name="releves_type"
                                    class="form-select  @error('releves_type') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner --') }}</option>
                                    <option value="personne_physique">{{ __('Personne Physique') }}</option>
                                    <option value="personne_morale">{{ __('Personne Morale') }}</option>
                                </select>
                                @error('releves_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="price">{{ __('Prix') }}</label>
                                <input wire:model="price" type="number" class="form-control  @error('price') is-invalid @enderror" placeholder="{{ __('') }}" required="">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="status">{{ __('Statut du Relevé Immo ') }}</label>
                                <select wire:model="status" name="status"
                                    class="form-select  @error('status') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner --') }}</option>
                                    <option value="expired">{{ __('expiré') }}</option>
                                    <option value="active">{{ __('actif') }}</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="releve_reason">{{ __('Raison du Relevé Immo') }}</label>
                                <textarea rows="6" wire:model="releve_reason"
                                    class="form-control @error('releve_reason') is-invalid @enderror" id="releve_reason" autofocus=""
                                    required=""></textarea>
                                @error('releve_reason')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="update" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Mettre à jour') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>