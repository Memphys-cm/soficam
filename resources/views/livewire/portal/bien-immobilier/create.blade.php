<div wire:ignore.self class="modal side-layout-modal fade" id="CreateEstateModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Bien Immobilier') }}</h1>
                        <p class="px-1"> {{ __('Créer un Bien Immobilier') }} </p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <div class='form-group row mb-3'>
                            <div class=" col">
                                <label for="releve_number">{{ __('Numéro relévé bien immo') }}</label>
                                <input type="text" wire:model="releve_number" class="form-control  @error('releve_number') is-invalid @enderror " placeholder="RENXXXXXX" id="releve_number" autofocus="" required="">
                                @error('releve_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class=" col"><label for="requestor_id">{{ __('Réquerant') }}</label>
                                <x-input.select wire:model="requestor_id" prettyname="requestor" :options="$requestors->pluck( 'first_name','id')->toArray()" />
                                @error('requestor_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="price">{{ __('Prix (FCFA)') }}</label>
                                <input type="text" wire:model="price" class="form-control  @error('price') is-invalid @enderror " placeholder="0" id="price" autofocus="" required="">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class=" col">
                                <label for="releves_type">{{ __('Type Personne') }}</label>
                                <select wire:model="releves_type" class="form-control" name="releves_type" id="releves_type">
                                    <option value="">--Select type--</option>
                                    <option value="personne_physique">Personne Physique</option>
                                    <option value="personne_morale">Personne Morale</option>
                                </select>
                                @error('releves_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-1 px-2">
                            <label for="releve_reason">Pourquoi voulez vous créer ce bien immobilier ? </label>
                            <textarea class="form-control" wire:model="releve_reason" name="releve_reason" id="releve_reason" placeholder="commentaires"></textarea>
                        </div>
                        </fieldset>

                        <div class="d-flex align-items-end mt-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-sm btn-loading">
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="d-none d-sm-inline-block ms-1">{{ __('Créer') }}</span>
                            </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>