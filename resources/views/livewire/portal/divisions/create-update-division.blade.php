<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateDivisionModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{$state ? 'Mettre à jour' : 'Creer'}} {{__(' Division')}}</h1>
                        <p class="px-1"> {{$state ? 'Mettre à jour' : 'Creer'}} {{__(' Division')}} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class="form-group row mb-3">
                            <div class='col'>
                                <label class="px-2" for="division.region_id">{{__('Region')}}</label>
                                <select wire:model="division.region_id" name="division.region_id" class="form-select  @error('division.region_id') is-invalid @enderror" required="">
                                    @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                                    @endforeach
                                </select>
                                @error('division.region_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="code">{{__('Code')}}</label>
                                <input wire:model="division.code" type="text" class="form-control  @error('division.code') is-invalid @enderror" placeholder="NW" required="" value="" name="division.code">
                                @error('division.code')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="px-2" for="name">{{__('Division Name ')}} <span>({{__('En')}})</span></label>
                            <input wire:model="division.division_name_en" type="text" class="form-control  @error('division.division_name_en') is-invalid @enderror" placeholder="{{__('North')}}" required="" name="name">
                            @error('division.division_name_en')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="px-2" for="name">{{__('Nom de la division ')}} <span>({{__('Fr')}})</span></label>
                            <input wire:model="division.division_name_fr" type="text" class="form-control  @error('division.division_name_fr') is-invalid @enderror" placeholder="{{__('Nord')}}" required="" name="name">
                            @error('division.division_name_fr')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class='form-group mb-4 px-1'>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" wire:model="division.status" id="division.status">
                                <label class="form-check-label mb-0" for="division.status">{{ __('Mark as Active') }}</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{$state ? 'Mettre à jour' : 'Creer'}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>