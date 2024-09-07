@can('imma_directe.descente_terrain')
    <div
        class="container my-4 {{ $imma_directe->statut !== "Certificat d'affichage signé" && !auth()->user()->hasRole('super_admin') ? 'disabled-page' : '' }}">
        <div class="shadow-lg rounded p-4 bg-white">
            <div class="mb-4 mt-md-0">
                <div class="mb-4 mt-md-0">
                    <h1 class="mb-0 h4">
                        {{ __('Descente') }}{{ __(' sur le terrain') }}
                    </h1>
                    <p class="px-1">
                        {{ __('Descente de la CC en vue du constat d’occupation et ou d’exploitation') }}
                    </p>
                </div>

                @php
                    $visibility = '';
                @endphp

                @if ($imma_directe->numero_ordre_versement)
                    @php
                        $visibility = 'disabled';
                    @endphp
                @endif

                <x-form-items.form wire:submit="descente_terrain">
                    <!-- Enregistrement des PVs administratifs -->
                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <label class="form-label"
                                for="pv_administratif">{{ __('Enregistrement des PVs administratifs') }}</label>
                            <input type="file" id="pv_administratif" class="form-control" wire:model="pv_administratif">
                            @error('pv_administratif')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Enregistrement des PVs de bornage -->
                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <label class="form-label" for="pv_bornage">{{ __('Enregistrement des PVs de bornage') }}</label>
                            <input type="file" id="pv_bornage" class="form-control" wire:model="pv_bornage">
                            @error('pv_bornage')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @php
                        $comissions = json_decode($imma_directe->comissions, true);
                    @endphp

                    @foreach ($comissions as $index => $member)
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <label class="form-label"
                                    for="cni_{{ $index }}">{{ __('Télécharger CNI pour ') }}{{ $member['name'] }}</label>
                                <input type="file" id="cni_{{ $index }}" class="form-control"
                                    wire:model="cni_files.{{ $index }}">
                                @error("cni_files.{$index}")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <!-- Boutons d'action -->
                    <div class="d-flex justify-content-end my-2">
                        <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                            data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                        <button type="submit" wire:click.prevent="descente_terrain" class="btn btn-primary btn-loading"
                            wire:loading.attr="disabled">{{ __('Enregistrer L\'instruction de la descente sur le Terrain') }}</button>
                    </div>
                </x-form-items.form>
            </div>

            <!-- Notice explicative -->
            <div class="my-2 p-2 shadow">
                <p class="text-warning">
                    {{ __('À cette étape, veuillez entrer les limites géographiques (Nord, Sud, Est, Ouest) et les informations des membres de la commission (nom, poste, numéro CNI, téléphone). Vous pouvez également ajouter des membres supplémentaires et télécharger les PVs administratifs et de bornage. Une fois les informations saisies, vous pouvez enregistrer la descente sur le terrain.') }}
                </p>
            </div>

        </div>
    @endcan
