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

                <x-form-items.form wire:submit="instruction_descente_terrain">

                    <div class='form-group mb-3 row'>
                        <div class='col'>
                            <label for="limit_nord">{{ __('Limite Nord') }}</label>
                            <input wire:model="limit_nord" type="text"
                                class="form-control  @error('limit_nord') is-invalid @enderror"
                                placeholder="{{ __('Road') }}" required="" value="" name="limit_nord">
                            @error('limit_nord')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class='col'>
                            <label for="limit_sud">{{ __('Limite Sud') }}</label>
                            <input wire:model="limit_sud" type="text"
                                class="form-control  @error('limit_sud') is-invalid @enderror"
                                placeholder="{{ __('Road') }}" required="" value="" name="limit_sud">
                            @error('limit_sud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class='col'>
                            <label for="limit_est">{{ __('Limite Est') }}</label>
                            <input wire:model="limit_est" type="text"
                                class="form-control  @error('limit_est') is-invalid @enderror"
                                placeholder="{{ __('Road') }}" required="" value="" name="limit_est">
                            @error('limit_est')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class='col'>
                            <label for="limit_ouest">{{ __('Limite Ouest') }}</label>
                            <input wire:model="limit_ouest" type="text"
                                class="form-control  @error('limit_ouest') is-invalid @enderror"
                                placeholder="{{ __('Road') }}" required="" value="" name="limit_ouest">
                            @error('limit_ouest')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
                            <label class="form-label"
                                for="pv_bornage">{{ __('Enregistrement des PVs de bornage') }}</label>
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
                        <button class="btn btn-secondary" wire:click.prevent="prevStep"> {{ __('<< Précedent') }} </button>
                        <button type="submit" wire:click.prevent="instruction_descente_terrain"
                            class="btn btn-primary btn-loading mx-2"
                            wire:loading.attr="disabled">{{ __('Enregistrer L\'instruction de la descente sur le Terrain') }}</button>
                        <button class="btn btn-info" wire:click.prevent="nextStep"> {{ __('Suivant >>') }} </button>
                    </div>
                </x-form-items.form>
            </div>

            <!-- Notice explicative -->
            <div class="my-2 p-2 shadow">
                <p class="text-warning">
                    {{ __('À cette étape, veuillez entrer les differents pvs et cni des membres de la comission.') }}
                </p>
            </div>

        </div>
    @endcan
