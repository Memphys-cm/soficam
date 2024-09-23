<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateSubDivisionModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{$state ? 'Mettre à jour' : __('Créer')}} {{__('Arrondissement')}}</h1>
                        <p class="px-1"> {{$state ? 'Mettre à jour' : __('Créer')}} {{__('Arrondissement')}}</p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class='form-group mb-3'>
                            <label class="px-2" for="sub_division.division_id">{{__('Département')}}</label>
                            <select wire:model="sub_division.division_id" name="sub_division.division_id" class="form-select  @error('sub_division.division_id') is-invalid @enderror" required="">
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->division_name}}</option>
                                @endforeach
                            </select>
                            @error('sub_division.division_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <div class='col'>
                                <label for="surface_area">{{__('Surface totale')}} M<sup>2</sup></label>
                                <input wire:model="sub_division.total_surface_area" type="text" class="form-control  @error('sub_division.total_surface_area') is-invalid @enderror" placeholder="1230000" required="" value="" name="sub_division.total_surface_area">
                                @error('sub_division.total_surface_area')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="code">{{__('Code')}}</label>
                                <input wire:model="sub_division.code" type="text" class="form-control  @error('sub_division.code') is-invalid @enderror" placeholder="NW" required="" value="" name="sub_division.code">
                                @error('sub_division.code')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="px-2" for="name">{{__('SubDivision Name ')}} <span>({{__('En')}})</span></label>
                            <input wire:model="sub_division.sub_division_name_en" type="text" class="form-control  @error('sub_division.sub_division_name_en') is-invalid @enderror" placeholder="{{__('North')}}" required="" name="name">
                            @error('sub_division.sub_division_name_en')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="px-2" for="name">{{__('Nom Arrondissement')}} <span>({{__('Fr')}})</span></label>
                            <input wire:model="sub_division.sub_division_name_fr" type="text" class="form-control  @error('sub_division.sub_division_name_fr') is-invalid @enderror" placeholder="{{__('Nord')}}" required="" name="name">
                            @error('sub_division.sub_division_name_fr')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="px-2" for="prix_minima_m2">{{__('Prix Minima au metre carre')}} <span>({{__('Fr')}})</span></label>
                            <input wire:model="sub_division.prix_minima_m2" type="text" class="form-control  @error('sub_division.prix_minima_m2') is-invalid @enderror" placeholder="{{__('0')}}" required="" name="name">
                            @error('sub_division.prix_minima_m2')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class='form-group mb-4 px-1'>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" wire:model="sub_division.status" id="sub_division.status">
                                <label class="form-check-label mb-0" for="sub_division.status">{{ __('Marquer comme actif') }}</label>
                            </div>
                        </div>
                        
                        

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary " wire:loading.attr="disabled">{{$state ? __('Mettre à jour') : __('Créer')}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>