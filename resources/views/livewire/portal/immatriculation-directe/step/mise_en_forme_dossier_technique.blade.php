<div class="container my-4">
    <div class="shadow-lg rounded p-4 bg-white">

        <div class="mb-4 mt-md-0">
            <h1 class="mb-0 h4">
                {{ __('Mise En Forme Dossier Technique') }}
            </h1>
            <p class="px-1">
                {{ __('Mettez en Forme le Dossier Technique') }}
            </p>
        </div>

        @if ($imma_directe->numero_ordre_versement)
            @php
                $visibility = 'disabled';
            @endphp
        @endif



        <x-form-items.form wire:submit="update_dossier_technique">
            <div class='form-group row mb-2'>
                <div class='col'>
                    <label class="px-2"
                        for="certificates_propriete_id">{{ __('Ajouter Les Pieces Manquantes Dans Le Dossier') }}</label>
                    <div class="input-group">
                        <input type="file" class="form-control" wire:model="attachments" multiple>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                    data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                <button type="submit" wire:click.prevent="update_dossier_technique" class="btn btn-primary btn-loading"
                    wire:loading.attr="disabled">{{ __('Enregistrer') }}</button>
            </div>
        </x-form-items.form>
    </div>

</div>
