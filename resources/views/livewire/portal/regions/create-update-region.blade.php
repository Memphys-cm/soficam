<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateRegionModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{$state ? __('Mettre à jour') : __('Créer')}} {{__('Région')}}</h1>
                        <p class="px-1"> {{$state ? __('Mettre à jour') : __('Créer')}} {{__('Région')}} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class='form-group mb-3'>
                            <label for="code">{{__('Code')}}</label>
                            <input wire:model="region.code" type="text" class="form-control  @error('region.code') is-invalid @enderror" placeholder="NW" required="" value="" name="region.code">
                            @error('region.code')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{__('Region Name ')}} <span>({{__('English')}})</span></label>
                            <input wire:model="region.region_name_en" type="text" class="form-control  @error('region.region_name_en') is-invalid @enderror" placeholder="{{__('North')}}" required="" name="name">
                            @error('region.region_name_en')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{__('Nom de la Région')}} <span>({{__('French')}})</span></label>
                            <input wire:model="region.region_name_fr" type="text" class="form-control  @error('region.region_name_fr') is-invalid @enderror" placeholder="{{__('Nord')}}" required="" name="name">
                            @error('region.region_name_fr')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class='form-group mb-4 px-1'>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" wire:model="region.status" id="region.status">
                                <label class="form-check-label mb-0" for="region.status">{{ __('Marquer comme actif') }}</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{$state ? __('Mettre à jour') : __('Créer')}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>