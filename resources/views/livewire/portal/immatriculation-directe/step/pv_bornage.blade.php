<div wire:ignore.self class="modal side-layout-modal fade" id="PvBornageModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Enregistrement') }}{{ __(' Des PV de Bornage') }}
                        </h1>
                        <p class="px-1">
                            {{__('Enregistrer') }}{{ __(' Les Pv de Bornages') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="pv_bornage">
                        <div class='form-group row mb-2'>
                            <div class='col'>
                                <label class="px-2" for="certificates_propriete_id">{{__('Ajouter Pv Bornage')}}</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" wire:model="attachments" multiple>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="pv_bornage"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Enregistrer')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
