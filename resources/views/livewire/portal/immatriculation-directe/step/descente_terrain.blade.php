<div class="container my-4">
    <div class="shadow-lg rounded p-4 bg-white">
    <div class="mb-4 mt-md-0">
        <div class="mb-4 mt-md-0">
            <h1 class="mb-0 h4">
                    {{ __('Descente') }}{{ __(' sur le terrain') }}
            </h1>
            <p class="px-1">
                {{__('Descente de la CC en vue du constat d’occupation et ou d’exploitation') }}
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
                        <div class='form-group mb-3 row'>
                            <div class='col'>
                                <label for="limit_nord">{{ __('Limite Nord') }}</label>
                                <input wire:model="limit_nord" type="text"
                                    class="form-control  @error('limit_nord') is-invalid @enderror"
                                    placeholder="{{ __('Road') }}" required="" value=""
                                    name="limit_nord">
                                @error('limit_nord')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="limit_sud">{{ __('Limite Sud') }}</label>
                                <input wire:model="limit_sud" type="text"
                                    class="form-control  @error('limit_sud') is-invalid @enderror"
                                    placeholder="{{ __('Road') }}" required="" value=""
                                    name="limit_sud">
                                @error('limit_sud')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="limit_est">{{ __('Limite Est') }}</label>
                                <input wire:model="limit_est" type="text"
                                    class="form-control  @error('limit_est') is-invalid @enderror"
                                    placeholder="{{ __('Road') }}" required="" value=""
                                    name="limit_est">
                                @error('limit_est')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="limit_ouest">{{ __('Limite Ouest') }}</label>
                                <input wire:model="limit_ouest" type="text"
                                    class="form-control  @error('limit_ouest') is-invalid @enderror"
                                    placeholder="{{ __('Road') }}" required="" value=""
                                    name="limit_ouest">
                                @error('limit_ouest')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for=""> {{__('Enregistrement des CNI des notables + chefs')}} </label> <br>
                        @foreach ($comissions as $index => $user)
                            <div class="row my-1 py-1">
                                <div class="col-md-3">
                                <label>{{__('Nom')}} </label>
                                    <input class="form-control  @error('comissions') is-invalid @enderror"
                                        type="text" wire:model="comissions.{{ $index }}.name"
                                        placeholder="Nom">
                                </div>
                                <div class="col-md-3">
                                    <label>{{__('Poste')}} </label>
                                    <input class="form-control @error('comissions') is-invalid @enderror" type="text"
                                        wire:model="comissions.{{ $index }}.position"
                                        placeholder="Poste">
                                </div>
                                <div class="col-md-3">
                                    <label for="">{{__('Numéro CNI')}}</label>
                                    <input class="form-control  @error('comissions') is-invalid @enderror"
                                        type="text" wire:model="comissions.{{ $index }}.num_cni"
                                        placeholder="Numéro CNI">
                                </div>
                                <div class="col-md-3">
                                    <label for="">{{__('Téléphone')}}</label>
                                    <input class="form-control  @error('comissions') is-invalid @enderror"
                                        type="text" wire:model="comissions.{{ $index }}.telephone"
                                        placeholder="Téléphone">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label>{{__('Action')}} </label>
                                    <a type="button" wire:click="removeRow({{ $index }})" class="btn-icon ">
                                        <svg class="icon icon-sm text-danger me-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <button class="btn btn-info" type="button" wire:click="addRow">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            {{ __('Ajouter un membre') }}</button>
                        <button class="btn btn-primary" type="submit">{{ __('Enregistrer') }}</button>
                        <hr>

                        <div class='form-group row mb-2'>
                            <div class='col-md-12'>
                                <label class="px-2" for="certificates_propriete_id">{{__('Ajouter Les Differents PV')}}</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" wire:model="attachments" multiple>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end my-2">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="descente_terrain"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Enregistrer La Descente sur le Terrain')}}</button>
                        </div>
        </x-form-items.form>
    </div>

</div>
