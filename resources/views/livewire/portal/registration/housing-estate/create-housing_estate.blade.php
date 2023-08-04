<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateHousingEstateModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:95%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ $state ? 'Update' : 'Create' }} {{ __(' Housing Estate') }}</h1>
                        <p class="px-1"> {{ $state ? 'Update' : 'Create' }} {{ __(' Housing Estate') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <fieldset class="border p-3">
                            <legend class="w-auto">Informations on the ground</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Land Title Number') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Land Title Area') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Public Usable Area') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Usable Area') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Area sold') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Remaining Area') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Bloc Number') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Lot Number') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-3 my-2">
                            <legend class="w-auto">{{__('Promoter Informations')}}</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Maeture') }}</label>
                                    <input wire:model="housing_estate.maeture" type="text"
                                        class="form-control  @error('housing_estate.maeture') is-invalid @enderror"
                                        placeholder="maeture" required="" value="" name="housing_estate.maeture">
                                    @error('housing_estate.maeture')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Developer') }}</label>
                                    <input wire:model="housing_estate.property_developer" type="text"
                                        class="form-control  @error('housing_estate.property_developer') is-invalid @enderror"
                                        placeholder="..." required="" value="" name="housing_estate.property_developer">
                                    @error('housing_estate.property_developer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Agent') }}</label>
                                    <input wire:model="housing_estate.estate_agent" type="text"
                                        class="form-control  @error('housing_estate.estate_agent') is-invalid @enderror"
                                        placeholder="..." required="" value="" name="housing_estate.estate_agent">
                                    @error('housing_estate.estate_agent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Lotisser') }}</label>
                                    <input wire:model="housing_estate.lotisser" type="text"
                                        class="form-control  @error('housing_estate.lotisser') is-invalid @enderror"
                                        placeholder="lotisser" required="" value="" name="housing_estate.lotisser">
                                    @error('housing_estate.lotisser')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Geometric Pratice') }}</label>
                                    <input wire:model="housing_estate.geometric_pratice" type="text"
                                        class="form-control  @error('housing_estate.geometric_pratice') is-invalid @enderror"
                                        placeholder="geometric_pratice" required="" value="" name="housing_estate.geometric_pratice">
                                    @error('housing_estate.geometric_pratice')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Geometric') }}</label>
                                    <input wire:model="housing_estate.geometric" type="text"
                                        class="form-control  @error('housing_estate.geometric') is-invalid @enderror"
                                        placeholder="geometric" required="" value="" name="housing_estate.geometric">
                                    @error('housing_estate.geometric')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Urban Planner') }}</label>
                                    <input wire:model="housing_estate.urbanist" type="text"
                                        class="form-control  @error('housing_estate.urbanist') is-invalid @enderror"
                                        placeholder="urbanist" required="" value="" name="housing_estate.urbanist">
                                    @error('housing_estate.urbanist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('controller') }}</label>
                                    <input wire:model="housing_estate.controller" type="text"
                                        class="form-control  @error('housing_estate.controller') is-invalid @enderror"
                                        placeholder="controller" required="" value="" name="housing_estate.controller">
                                    @error('housing_estate.controller')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        @foreach($blocks as $blockIndex => $block)
                        <fieldset class="border p-3 mb-3">
                            <legend class="w-auto">{{ $block['name'] }}</legend>
            
                            <div class="form-group">
                                <label for="blockName">Block Name</label>
                                <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.name">
                            </div>
            
                            @foreach($block['parcels'] as $lotIndex => $lot)
                            @if ($lot['type'] != 'public')
                            <div class="row form-group mt-3 mb-2">
                                <div class="col-md-1">
                                    <label for="lotNumero">Lot Number</label>
                                    <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_no">
                                </div>
                                
                                
                                <div class="col-md-1">
                                    <label for="parcelsuperficie">AREA OF LOT</label>
                                    <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_area">
                                </div>
            
                                <div class="col-md-1">
                                    <label for="lotEtat">State Of Lot</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.condition_lot">
                                </div>

                                <div class="col-md-1">
                                    <label for="lotNumero">LOT STATUS</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_status">
                                </div>
            
                                <div class="col-md-1">
                                    <label for="parcelsuperficie">NOTARY'S OFFICE</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.notary_office">
                                </div>
            
                                <div class="col-md-1">
                                    <label for="lotEtat">NOTARY'S CLERK</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.notary_clerk">
                                </div>

                                
                                <div class="col-md-2 pt-4">
                                    <label for="lotNumero">GEOMETRIC PRACTICE</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.geometric_pratic">
                                </div>
            
                                <div class="col-md-2 pt-4">
                                    <label for="parcelsuperficie">GEOMETRICIAN</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.geometrician">
                                </div>
            
                                <div class="col-md-2 pt-4">
                                    <label for="lotEtat">Date</label>
                                    <input type="date" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.date">
                                </div>

                            </div> 
                            @else
                            <div class="row form-group mt-3 mb-2">
                                <div class="col-md-3">
                                    <label for="lotNumero">Lot Number</label>
                                    <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_no">
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <label for="parcelsuperficie">AREA OF LOT</label>
                                    <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_area">
                                </div>
            
                                <div class="col-md-3">
                                    <label for="lotEtat">Lot Affectation</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_affectation">
                                </div>
            
                                <div class="col-md-3">
                                    <label for="lotEtat">Date</label>
                                    <input type="date" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.date">
                                </div>

                            </div>  
                            @endif
                            
            
                                <button type="button" wire:click="removeLot({{ $blockIndex }}, {{ $lotIndex }})" class="btn btn-danger">Remove Lot</button>
                            @endforeach
            
                            <button type="button" wire:click="addLot({{ $blockIndex }})" class="btn btn-primary">{{__('Add Lot')}}</button>
                            <button type="button" wire:click="addLotPublic({{ $blockIndex }})" class="btn btn-primary">{{__('Add Lot Public')}}</button>
                            <button type="button" wire:click="removeBlock({{ $blockIndex }})" class="btn btn-danger">Remove Block</button>
                        </fieldset>
                    @endforeach
            
                    {{-- <div class="form-group">
                        <label for="newBlockName">New Block Name</label>
                        <input type="text" class="form-control" wire:model="newBlockName">
                    </div> --}}
                    <button type="button" wire:click="addBlock" class="btn btn-primary">Add Block</button>
                    {{-- <button type="button" wire:click="addDefaultLot" class="btn btn-primary">Add Lot</button> --}}
                

                        {{-- <fieldset class="border p-3 my-2">
                            <legend class="w-auto">{{ __('Promoter Informations') }}</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Master') }}</label>
                                    <input wire:model="housing_estate.code" type="text"
                                        class="form-control  @error('housing_estate.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="housing_estate.code">
                                    @error('housing_estate.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset> --}}

                        <div class="d-flex justify-content-end py-2">
                            <button type="button" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ $state ? 'Update' : 'Create' }} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
