<div class="container my-4">
    <div class="shadow-lg rounded p-4 bg-white">

        <div class="mb-4 mt-md-0">
            <h1 class="mb-0 h4">
                {{ __('Modification') }} {{ __('Du Statut D\'un Dossier') }}
            </h1>
            <p class="px-1">
                {{ __('Modifier') }} {{ __('le statut D\'un Dossier D\'Immatrculation') }}
            </p>
        </div>

        @if ($imma_directe->numero_ordre_versement)
            @php
                $visibility = 'disabled';
            @endphp
        @endif

        <x-form-items.form wire:submit="bordereau">
            <div class="form-group mb-3 row">
                <div class="col-md-12">
                    <label for="numero_bordereau_transmission">{{ __('Numéro Bordereau Transmission') }}</label>
                    <input wire:model="numero_bordereau_transmission" type="text"
                        class="form-control  @error('numero_bordereau_transmission') is-invalid @enderror"
                        placeholder="{{ __('') }}" required="" name="numero_bordereau_transmission">
                    @error('numero_bordereau_transmission')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                    data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                <button type="submit" wire:click.prevent="bordereau"
                    class="btn btn-primary btn-loading"
                    wire:loading.attr="disabled">{{ __('Modifier le Statut') }}</button>
            </div>
        </x-form-items.form>
    </div>

</div>
