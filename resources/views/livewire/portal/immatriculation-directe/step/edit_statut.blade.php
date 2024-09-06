<div class="container my-4 ">
    <div class="shadow-lg rounded p-4 bg-white">
        <div class="mb-4 mt-md-0">

            <div class="mb-4 mt-md-0">
                <h1 class="mb-0 h4">
                    {{ __('Modification') }}{{ __('Du Statut D\'un Dossier') }}
                </h1>
                <p class="px-1">
                    {{ __('Modifier') }}{{ __(' le statut D\'un Dossier D\'Immatrculation') }}
                </p>
            </div>

            {{-- @if ($imma_directe->numero_ordre_versement)
                @php
                    $visibility = 'disabled';
                @endphp
            @endif --}}


            <x-form-items.form wire:submit="edit_statut">
                <div class="form-group mb-3 row">
                    @can('imma_directe.avis', $imma_directe)
                        <div class="col-md-12">
                            <label for="status">{{ __('Statut') }}</label>
                            <input wire:model="status" type="text"
                                class="form-control  @error('status') is-invalid @enderror"
                                placeholder="{{ __('') }}" required="" value="{{ $status }}" name="status"
                                disabled>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="status">{{ __('Date') }}</label>
                            <input wire:model="date_status" type="date"
                                class="form-control  @error('date_status') is-invalid @enderror"
                                placeholder="{{ __('') }}" required="" name="date_status">
                            @error('date_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endcan
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                        data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                    <button type="submit" wire:click.prevent="edits_statut" class="btn btn-primary btn-loading"
                        wire:loading.attr="disabled">{{ __('Modifier le Statut') }}</button>
                </div>
            </x-form-items.form>

            <!-- Notice explicative -->
            <div class="my-2 p-2 shadow">
                <p class="text-warning">
                    {{ __('À cette étape, veuillez modifier le statut du dossier d\'immatriculation et indiquer la date correspondante. Une fois les informations saisies, vous pouvez enregistrer les modifications.') }}
                </p>
            </div>

        </div>

    </div>
