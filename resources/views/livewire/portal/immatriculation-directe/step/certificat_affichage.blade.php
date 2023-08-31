<div wire:ignore.self class="modal side-layout-modal fade" id="CertfifcatAffichageImmaDirecteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Etablissement') }}{{ __('Certficat D\'un Dossier') }}
                        </h1>
                        <p class="px-1">
                            {{ __('Imprimer') }}{{ __('Un Certificat D\'affichage') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="certificat_affichage">
                        <div class="form-group mb-3 row">
                            <div class='col-12 my-1'>
                                <label for="code">{{ __('Date de Debut') }}</label>
                                <input wire:model="date_debut" type="date"
                                    class="form-control  @error('date_debut') is-invalid @enderror"
                                    placeholder="15000" required="" value="" name="date_debut">
                                @error('date_debut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='col-12 my-1'>
                                <label for="code">{{ __('Date de Fin') }}</label>
                                <input wire:model="date_fin" type="date"
                                    class="form-control  @error('date_fin') is-invalid @enderror"
                                    placeholder="15000" required="" value="" name="date_fin">
                                @error('date_fin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="certificat_affichage"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Imprimer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
