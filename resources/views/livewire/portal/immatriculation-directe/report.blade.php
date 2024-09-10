<div wire:ignore.self class="modal side-layout-modal fade" id="RapportModal" tabindex="-1" aria-labelledby="modal-form"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:30%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Exporter les rapports sur l\'immatriculation directe') }}</h1>
                        <p class="px-1"> {{ __('Exporter les rapports sur l\'immatriculation directe') }}</p>
                    </div>
                    <x-form-items.form wire:submit="export">
                        <div class='col'>
                            <label class="px-2 pb-2" for="requestor_id">{{ __('Element de recherche') }}</label>
                            <select class="form-select" wire:model="element">
                                <option value="">{{ __('Selectionner') }}</option>
                                <option value="region">{{ __('Region') }}</option>
                                <option value="departement">{{ __('Departement') }}</option>
                                <option value="arrondissement">{{ __('Arrondissement') }}</option>
                                <option value="statut">{{ __('Statut') }}</option>
                            </select>
                            @error('user_ids')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ($element == 'region')
                            <div class='col'>
                                <label class="px-2 pt-3" for="requestor_id">{{ __('Region') }}</label>
                                <x-input.select wire:model="selector" prettyname="region" :options="$regions->pluck('region_name_fr', 'id')->toArray()" />
                            </div>
                        @elseif ($element == 'departement')
                            <div class='col pt-3'>
                                <label class="px-2 " for="requestor_id">{{ __('Departement') }}</label>
                                <x-input.select wire:model="selector" prettyname="division" :options="$divisions->pluck('division_name_fr', 'id')->toArray()" />
                            </div>
                        @elseif ($element == 'arrondissement')
                            <div class='col pt-3'>
                                <label class="px-2" for="requestor_id">{{ __('Arrondissement') }}</label>
                                <x-input.select wire:model="selector" prettyname="subdivisions" :options="$subdivisions->pluck('sub_division_name_fr', 'id')->toArray()" />
                            </div>
                        @elseif ($element == 'statut')
                            <div class='col pt-3'>
                                <label class="px-2" for="requestor_id">{{ __('Statut') }}</label>
                                <select class="form-select" wire:model="selector">
                                    <option value="">{{ __('Selectionner') }}</option>
                                    <option value="Titre foncier créer">{{ __('Traité') }}</option>
                                </select>
                            </div>
                        @endif

                        <div class="d-flex pt-3 justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="export" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Export') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
