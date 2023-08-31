<div wire:ignore.self class="modal side-layout-modal fade" id="CreateImmaDirecteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ $state ? __('Modifier') : __('Enregistrer') }}{{ __(' une Immatrculation Directe') }}
                        </h1>
                        <p class="px-1">
                            {{ $state ? __('Modifier') : __('Enregistrer') }}{{ __(' un Dossier D\'Immatrculation Directe') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="{{ $state ? 'update' : 'store' }}">
                        <div class="form-group mb-3 row">
                            <div class='col'>
                                <label class="px-2" for="user_ids">{{__('Requerants')}}</label>
                                <x-input.selectmultipleusers wire:model="user_ids" prettyname="user_ids" :options="$users" selected="('user_ids')"  multiple="multiple"/>
                                @error('user_ids')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="numero_folio">{{ __('Localisation') }}</label>
                                <input wire:model="localisation" type="text"
                                    class="form-control  @error('localisation') is-invalid @enderror"
                                    placeholder="{{ __('Yaounde , Mendong') }}" required=""
                                    name="localisation">
                                @error('localisation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class='col'>
                                <label class="px-2" for="region_id">{{__('Region')}}</label>
                                <select wire:model="region_id" name="region_id" class="form-select  @error('region_id') is-invalid @enderror" required="">
                                    @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="division_id">{{__('Departement')}}</label>
                                <select wire:model="division_id" name="division_id" class="form-select  @error('division_id') is-invalid @enderror" required="">
                                    @foreach($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="sub_division_id">{{__('Arrondissement')}}</label>
                                <select wire:model="sub_division_id" name="sub_division_id" class="form-select  @error('sub_division_id') is-invalid @enderror" required="">
                                    @foreach($sub_divisions as $sub_division)
                                    <option value="{{$sub_division->id}}">{{$sub_division->sub_division_name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_division_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="p-3 shadow my-4">
                            <h2 class="h5 mb-4">{{__('Ajouter les fichiers')}}</h2>
                            <div class="d-xl-flex align-items-center">
                                <div class="file-field">
                                    <div class="d-flex justify-content-xl-center ms-xl-3">
                                        <div class="d-flex"><svg class="icon text-gray-500 me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <input type="file" class="form-control-file" wire:model="attachements">
                                            <div class="d-md-block text-left">
                                                <div class="fw-normal text-dark mb-1">{{__('Choisir les fichiers')}}</div>
                                                <div class="text-gray small">JPG,PNG, PDF, Word,Excel. Max size of 50MB</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @foreach ($comissions as $index => $user)
                            <div class="row my-1 py-1">
                                <div class="col-md-5">
                                <label>{{__('Nom')}} </label>
                                    <input class="form-control  @error('comissions') is-invalid @enderror"
                                        type="text" wire:model="comissions.{{ $index }}.name"
                                        placeholder="Nom">
                                </div>
                                <div class="col-md-5">
                                    <label>{{__('Poste')}} </label>
                                    <input class="form-control @error('comissions') is-invalid @enderror" type="text"
                                        wire:model="comissions.{{ $index }}.position"
                                        placeholder="Poste">
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
                        <hr> --}}

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="{{ $state ? 'update' : 'store' }}"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ $state ? __('Mettre à jour') : __('Enregistrer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
