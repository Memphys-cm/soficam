<div class="container my-4 ">
    <div class="shadow-lg rounded p-4 bg-white">
        <div class="mb-4 mt-md-0">
            <div class="mb-4 mt-md-0">
                <h1 class="mb-0 h4">
                    {{ __('Etablissement De L\'ordre de versement de la redevance fonciere') }}
                </h1>
                <p class="px-1">
                    {{ __('Etablir') }}{{ __('L\'ordre de versement de la redevance fonciere') }}
                </p>
            </div>
            <x-form-items.form wire:submit="ordre_redevance_fonciere">
                <div class="form-group mb-3 row">
                    <div class="col-md-12">
                        <label
                            for="montant_ordre_redevance_fonciere">{{ __('Montant Ordre Versement de la redevance fonciere') }}</label>
                        <input wire:model="montant_ordre_redevance_fonciere" type="text"
                            class="form-control  @error('montant_ordre_redevance_fonciere') is-invalid @enderror"
                            placeholder="{{ __('') }}" required="" name="montant_ordre_redevance_fonciere" disabled>
                        @error('montant_ordre_redevance_fonciere')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                        data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                    <button type="submit" wire:click.prevent="ordre_redevance_fonciere"
                        class="btn btn-primary btn-loading"
                        wire:loading.attr="disabled">{{ __('Enregistrer L\'Ordre de Versement') }}</button>
                </div>
            </x-form-items.form>
        </div>
    </div>
</div>
