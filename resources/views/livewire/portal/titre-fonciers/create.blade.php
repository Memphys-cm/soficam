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
                                <input wire:model="etat_TF" type="text" class="form-control  @error('etat_TF') is-invalid @enderror" placeholder="{{__('Active')}}" required="" name="name">
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