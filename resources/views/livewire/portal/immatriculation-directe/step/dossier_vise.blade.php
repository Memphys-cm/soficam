<div wire:ignore.self class="modal side-layout-modal fade" id="DossierViseImmaDirecteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Etablissement') }}{{ __(' Le Dossier Visé-Enregistré') }}
                        </h1>
                        <p class="px-1">
                            {{ __('Etablir Le Montant à Payer') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="">
                        <div class="form-group mb-3 row">
                            <div class='col-12 my-1'>
                                <label for="code">{{ __('Montant du dossier visé-enregistré') }}</label>
                                <input wire:model="montant_dossier_vise" type="number"
                                    class="form-control  @error('montant_dossier_vise') is-invalid @enderror"
                                    placeholder="15000" required="" value="" name="montant_dossier_vise">
                                @error('montant_dossier_vise')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="dossier_vise"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Appliquer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
