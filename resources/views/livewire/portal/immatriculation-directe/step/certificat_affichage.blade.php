@can('imma_directe.certificat_affichage')
    <div class="container my-4 {{ $imma_directe->statut !== 'Avis au Public Signé' && !auth()->user()->hasRole('super_admin') ? 'disabled-page' : '' }}">
        <div class="shadow-lg rounded p-4 bg-white">

            <div class="mb-4 mt-md-0">
                <h1 class="mb-0 h4">
                    {{ __('Etablissement') }}{{ __(' Certficat D\'un Dossier') }}
                </h1>
                <p class="px-1">
                    {{ __('Imprimer') }}{{ __(' Un Certificat D\'affichage') }}
                </p>
            </div>

            @if ($imma_directe->numero_ordre_versement)
                @php
                    $visibility = 'disabled';
                @endphp
            @endif


            <x-form-items.form wire:submit="certificat_affichage">
                <div class="form-group mb-3 row">
                    <div class='col-12 my-1'>
                        <label for="code">{{ __('Date de Debut') }}</label>
                        <input wire:model="date_debut" type="date"
                            class="form-control  @error('date_debut') is-invalid @enderror" placeholder="15000"
                            required="" value="" name="date_debut">
                        @error('date_debut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='col-12 my-1'>
                        <label for="code">{{ __('Date de Fin') }}</label>
                        <input wire:model="date_fin" type="date"
                            class="form-control  @error('date_fin') is-invalid @enderror" placeholder="15000" required=""
                            value="" name="date_fin">
                        @error('date_fin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                        data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                    <button type="submit" wire:click.prevent="certificat_affichage" class="btn btn-primary btn-loading"
                        wire:loading.attr="disabled">{{ __('Imprimer') }}</button>
                </div>
            </x-form-items.form>

            <!-- Notice explicative -->
            <div class="my-2 p-2 shadow">
                <p class="text-warning">
                    {{ __('À cette étape, veuillez entrer les dates de début et de fin pour l\'établissement du certificat d\'affichage. Une fois les informations saisies, vous pouvez imprimer le certificat et une fois terminer passer a la prochaine etape]') }}
                </p>
            </div>
        </div>


    </div>
@endcan
