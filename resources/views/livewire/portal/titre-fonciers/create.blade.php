<div wire:ignore.self class="modal side-layout-modal fade" id="CreateTitreFoncierModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:60%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{$state ? __('Update') : __('Register')}}{{__(' a Land title')}}</h1>
                        <p class="px-1"> {{$state ? __('Update') : __('Register')}}{{__(' a Land title certificate')}} </p>
                    </div>
                    <x-form-items.form wire:submit="{{$state ? 'update':'store'}}">
                        <div class='form-group mb-3 row'>
                            <div class='col'>
                                <label for="numero_titre_foncier">{{__('Land Title Number')}}</label>
                                <input wire:model="numero_titre_foncier" type="text" class="form-control  @error('numero_titre_foncier') is-invalid @enderror" placeholder="10056/234/NW09" required="" value="" name="numero_titre_foncier">
                                @error('numero_titre_foncier')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="date_de_delivrance_du_TF">{{__('Land Title Delivered On')}}</label>
                                <input wire:model="date_de_delivrance_du_TF" type="date" class="form-control  @error('date_de_delivrance_du_TF') is-invalid @enderror" placeholder="{{__('1986')}}" required="" name="name">
                                @error('date_de_delivrance_du_TF')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="numero_du_duplicata">{{__('Duplicate Number')}}</label>
                                <input wire:model="numero_du_duplicata" type="number" class="form-control  @error('numero_du_duplicata') is-invalid @enderror" placeholder="{{__('05')}}" required="" name="name">
                                @error('numero_du_duplicata')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class='col'>
                                <label class="px-2" for="user_ids">{{__('Propriators')}}</label>
                                <x-input.selectmultipleusers wire:model="user_ids" prettyname="user_ids" :options="$users" selected="('user_ids')" />
                                @error('user_ids')
                                <div class="invalid-feedback">{{$message}}</div>
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
                                <label class="px-2" for="division_id">{{__('Division')}}</label>
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
                                <label class="px-2" for="sub_division_id">{{__('SubDivision')}}</label>
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
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="lieu_dit">{{__('Village')}}</label>
                                <input wire:model="lieu_dit" type="text" class="form-control  @error('lieu_dit') is-invalid @enderror" placeholder="{{__('Bwadibo')}}" required="" name="name">
                                @error('lieu_dit')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="groupement">{{__('Groupement')}}</label>
                                <input wire:model="groupement" type="text" class="form-control  @error('groupement') is-invalid @enderror" placeholder="{{__('Cantoon')}}" required="" value="" name="groupement">
                                @error('groupement')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="zone">{{__('Duplicate Number')}}</label>
                                <select wire:model="zone" name="zone" class="form-select  @error('zone') is-invalid @enderror" required="">
                                    <option value="urbaine">{{__('Urban')}}</option>
                                    <option value="rurale">{{__('Rural')}}</option>
                                </select>
                                @error('zone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="numero_folio">{{__('Folio Number')}}</label>
                                <input wire:model="numero_folio" type="number" class="form-control  @error('numero_folio') is-invalid @enderror" placeholder="{{__('34')}}" required="" name="name">
                                @error('numero_folio')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="volume">{{__('volume')}}</label>
                                <input wire:model="volume" type="number" class="form-control  @error('volume') is-invalid @enderror" placeholder="{{__('124')}}" required="" name="name">
                                @error('volume')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="superficie_du_TF_mere">{{__('Surface Area parent Land title')}}</label>
                                <input wire:model="superficie_du_TF_mere" type="number" class="form-control  @error('superficie_du_TF_mere') is-invalid @enderror" placeholder="{{__('12hac')}}" required="" value="" name="superficie_du_TF_mere">
                                @error('superficie_du_TF_mere')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="etat_TF">{{__('State of Land Title')}}</label>
                                <select wire:model="etat_TF" name="etat_TF" class="form-select  @error('etat_TF') is-invalid @enderror" required="">
                                    <option value="">{{__('Select Land title state')}}</option>
                                    <option value="HYPOTHEQUE">{{__('HYPOTHEQUE')}}</option>
                                    <option value="DISPONIBLE">{{__('DISPONIBLE')}}</option>
                                    <option value="PRENOTE">{{__('PRENOTE')}}</option>
                                    <option value="SUSPENDU">{{__('SUSPENDU')}}</option>
                                </select>
                                @error('etat_TF')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="etat_terrain">{{__('State of Land')}}</label>
                                <select wire:model="etat_terrain" name="etat_terrain" class="form-select  @error('etat_terrain') is-invalid @enderror" required="">
                                    <option value="batit">{{__('Built')}}</option>
                                    <option value="non_batit">{{__('Not built')}}</option>
                                </select>
                                @error('etat_terrain')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="provenance_TF">{{__('Source of Land Title')}}</label>
                                <input wire:model="provenance_TF" type="text" class="form-control  @error('provenance_TF') is-invalid @enderror" placeholder="{{__('Lotissement')}}" required="" name="name">
                                @error('provenance_TF')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class='col'>
                                <label for="limit_nord">{{__('North Limit')}}</label>
                                <input wire:model="limit_nord" type="text" class="form-control  @error('limit_nord') is-invalid @enderror" placeholder="{{__('Road')}}" required="" value="" name="limit_nord">
                                @error('limit_nord')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="limit_sud">{{__('South Limit')}}</label>
                                <input wire:model="limit_sud" type="text" class="form-control  @error('limit_sud') is-invalid @enderror" placeholder="{{__('Road')}}" required="" value="" name="limit_sud">
                                @error('limit_sud')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="limit_est">{{__('East Limit')}}</label>
                                <input wire:model="limit_est" type="text" class="form-control  @error('limit_est') is-invalid @enderror" placeholder="{{__('Road')}}" required="" value="" name="limit_est">
                                @error('limit_est')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-4 row'>
                            <div class='col'>
                                <label for="limit_ouest">{{__('West Limit')}}</label>
                                <input wire:model="limit_ouest" type="text" class="form-control  @error('limit_ouest') is-invalid @enderror" placeholder="{{__('Road')}}" required="" value="" name="limit_ouest">
                                @error('limit_ouest')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="nom_et_prenoms_de_largent_traitant">{{__('Agent Traitant')}}</label>
                                <input wire:model="nom_et_prenoms_de_largent_traitant" type="text" class="form-control  @error('nom_et_prenoms_de_largent_traitant') is-invalid @enderror" placeholder="{{__('Road')}}" required="" value="" name="nom_et_prenoms_de_largent_traitant">
                                @error('nom_et_prenoms_de_largent_traitant')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label for="le_conservateur">{{__('Conservateur')}}</label>
                                <input wire:model="le_conservateur" type="text" class="form-control  @error('le_conservateur') is-invalid @enderror" placeholder="{{__('Jane Doe')}}" required="" value="" name="le_conservateur">
                                @error('le_conservateur')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='col'>
                            <label for="numero_ccp">{{__('Numero CCP')}}</label>
                            <input wire:model="numero_ccp" type="number" class="form-control  @error('numero_ccp') is-invalid @enderror" placeholder="{{__('Jane Doe')}}" required="" value="" name="numero_ccp">
                            @error('numero_ccp')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="p-3 shadow my-4">
                            <h2 class="h5 mb-4">{{__('Add Files')}}</h2>
                            <div class="d-xl-flex align-items-center">
                                <div class="file-field">
                                    <div class="d-flex justify-content-xl-center ms-xl-3">
                                        <div class="d-flex"><svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
                                            </svg>
                                            <input type="file" class="form-control-file" wire:model="attachements">
                                            <div class="d-md-block text-left">
                                                <div class="fw-normal text-dark mb-1">{{__('Choose Files')}}</div>
                                                <div class="text-gray small">JPG,PNG, PDF, Word,Excel. Max size of 50MB</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($coordinates as $coordinateIndex => $coordinate)
                        <div class='form-group mb-2 d-flex align-items-end justify-content-between'>
                            <div class=''>
                                <label for="coordonnees.{{$coordinateIndex}}">{{__('Coordonnees')}} - B{{ $loop->iteration }}</label>
                                <input wire:model="coordonnees.{{$coordinateIndex}}" type="text" step="0.0001" class="form-control col-md-12 @error('coordonnees') is-invalid @enderror" placeholder="{{__('45.XXXXX')}}" required="" value="" name="coordonnees">
                                @error('coordonnees')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <a type="button" wire:click="removeCoordinate({{ $coordinateIndex }})" class="btn-icon ">
                                <svg class="icon icon-sm text-danger me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                        @endforeach
                        <hr>
                        <button type="button" wire:click="addCoordinate" class="btn btn-sm btn-outline-primary">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            {{__('Add Coordinate')}}
                        </button>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" wire:click.prevent="{{$state ? 'update':'store'}}" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{$state ? __('Update') : __('Register')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>