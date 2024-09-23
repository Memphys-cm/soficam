@can('imma_directe.etat_cession')
    <div class="container my-4 {{ $imma_directe->statut !== 'Descente sur le terrain effectuée' && !auth()->user()->hasRole('super_admin')? 'disabled-page' : '' }}">
        <div class="shadow-lg rounded p-4 bg-white">
            <div class="mb-4 mt-md-0">
                <h1 class="mb-0 h4">{{ __('Etat Cession') }}</h1>
                <p class="px-1"> {{ __(' Etat Cession') }} &#128522;
                </p>
            </div>

            @if ($imma_directe->numero_ordre_versement)
                @php
                    $visibility = 'disabled';
                @endphp
            @endif


            <x-form-items.form wire:submit.prevent="etatDeCession">

                <div class='row form-group mb-3'>
                    <div class="col-md-6 py-2">
                        <label for="code">{{ __('Zone') }}</label>
                        <select wire:model="zone" name="zone" class="form-select  @error('zone') is-invalid @enderror">
                            <option value="">{{ __('--Sélectionner la Zone --') }}</option>
                            <option value="urbain">{{ __('terrain_urbain') }} </option>
                            <option value="rurale">{{ __('terrain_rurale') }} </option>
                        </select>
                        @error('zone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 py-2">
                        <label for="code">{{ __('Coût') }}</label>
                        <input wire:model="cout" type="number" class="form-control  @error('cout') is-invalid @enderror"
                            placeholder="" required="" value="" name="cout">
                        @error('cout')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 py-2">
                        <label for="code">{{ __('Frais Supplémentaires') }}</label>
                        <input wire:model="frais_suplementaires" type="number"
                            class="form-control  @error('frais_suplementaires') is-invalid @enderror" placeholder=""
                            required="" value="" name="frais_suplementaires">
                        @error('frais_suplementaires')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 py-2">
                        <label for="code">{{ __('Coût état cession') }}</label>
                        <input wire:model="cout_etat_cession" type="number"
                            class="form-control  @error('cout_etat_cession') is-invalid @enderror" placeholder=""
                            required="" value="" name="cout_etat_cession">
                        @error('cout_etat_cession')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 py-2">
                        <label for="code">{{ __('Commentaires') }}</label>
                        <textarea wire:model="commentaires" class="form-control  @error('commentaires') is-invalid @enderror" name=""
                            id="" cols="30" rows="10">
            </textarea>
                        @error('commentaires')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end py-2">
                    <button type="button" wire:click.prevent="clearFields"
                        class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                        data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                    <button type="submit" class="btn btn-primary btn-loading"
                        wire:loading.attr="disabled">{{ 'Créer' }} </button>
                </div>
            </x-form-items.form>

            <!-- Notice explicative -->
            <div class="my-2 p-2 shadow">
                <p class="text-warning">
                    {{ __('À cette étape, veuillez sélectionner la zone (urbaine ou rurale), entrer la superficie en m², le coût, les frais supplémentaires, le coût de l\'état de cession et ajouter des commentaires si nécessaire. Une fois les informations saisies, vous pouvez créer l\'état de cession.') }}
                </p>
            </div>

        </div>

    </div>
@endcan
