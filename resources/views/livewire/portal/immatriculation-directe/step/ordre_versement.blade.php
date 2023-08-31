<div wire:ignore.self class="modal side-layout-modal fade" id="OrdreVersementImmaDirecteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Etablissement') }}{{ __('Ordre de Versement D\'un Dossier') }}
                        </h1>
                        <p class="px-1">
                            {{ __('Etablir L\'ordre de Versement') }}{{ __(' un Dossier D\'Immatrculation Directe') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="ordre_versement">
                        <div class="form-group mb-3 row">
                            <div class='col-12 my-1'>
                                <label for="code">{{ __('Montant de L\'ordre de Versement') }}</label>
                                <input wire:model="montant_ordre_versement" type="number"
                                    class="form-control  @error('montant_ordre_versement') is-invalid @enderror"
                                    placeholder="15000" required="" value="" name="montant_ordre_versement">
                                @error('montant_ordre_versement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class='col-12 my-1'>
                                <label for="code">{{ __('Superficie de L\'ordre de Versement') }}</label>
                                <input wire:model="superficie_ordre_versement" type="number"
                                    class="form-control  @error('superficie_ordre_versement') is-invalid @enderror"
                                    placeholder="15000" required="" value="" name="superficie_ordre_versement">
                                @error('superficie_ordre_versement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="ordre_versement"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Appliquer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
