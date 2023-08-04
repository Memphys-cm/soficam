<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateSubdivisionModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:75%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ $state ? 'Update' : 'Create' }} {{ __(' Subdivision') }}</h1>
                        <p class="px-1"> {{ $state ? 'Update' : 'Create' }} {{ __(' Subdivision') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <fieldset class="border p-3">
                            <legend class="w-auto">Informations on the ground</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Land Title Number') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Land Title Area') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Public Usable Area') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Usable Area') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Area sold') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Remaining Area') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Bloc Number') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Lot Number') }}</label>
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
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
                                    <input wire:model="subdivision.maeture" type="text"
                                        class="form-control  @error('subdivision.maeture') is-invalid @enderror"
                                        placeholder="maeture" required="" value="" name="subdivision.maeture">
                                    @error('subdivision.maeture')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Developer') }}</label>
                                    <input wire:model="subdivision.property_developer" type="text"
                                        class="form-control  @error('subdivision.property_developer') is-invalid @enderror"
                                        placeholder="..." required="" value="" name="subdivision.property_developer">
                                    @error('subdivision.property_developer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Agent') }}</label>
                                    <input wire:model="subdivision.estate_agent" type="text"
                                        class="form-control  @error('subdivision.estate_agent') is-invalid @enderror"
                                        placeholder="..." required="" value="" name="subdivision.estate_agent">
                                    @error('subdivision.estate_agent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Lotisser') }}</label>
                                    <input wire:model="subdivision.lotisser" type="text"
                                        class="form-control  @error('subdivision.lotisser') is-invalid @enderror"
                                        placeholder="lotisser" required="" value="" name="subdivision.lotisser">
                                    @error('subdivision.lotisser')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Geometric Pratice') }}</label>
                                    <input wire:model="subdivision.geometric_pratice" type="text"
                                        class="form-control  @error('subdivision.geometric_pratice') is-invalid @enderror"
                                        placeholder="geometric_pratice" required="" value="" name="subdivision.geometric_pratice">
                                    @error('subdivision.geometric_pratice')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Geometric') }}</label>
                                    <input wire:model="subdivision.geometric" type="text"
                                        class="form-control  @error('subdivision.geometric') is-invalid @enderror"
                                        placeholder="geometric" required="" value="" name="subdivision.geometric">
                                    @error('subdivision.geometric')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Urban Planner') }}</label>
                                    <input wire:model="subdivision.urbanist" type="text"
                                        class="form-control  @error('subdivision.urbanist') is-invalid @enderror"
                                        placeholder="urbanist" required="" value="" name="subdivision.urbanist">
                                    @error('subdivision.urbanist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('controller') }}</label>
                                    <input wire:model="subdivision.controller" type="text"
                                        class="form-control  @error('subdivision.controller') is-invalid @enderror"
                                        placeholder="controller" required="" value="" name="subdivision.controller">
                                    @error('subdivision.controller')
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
            
                            @foreach($block['lots'] as $lotIndex => $lot)
                            <div class="row form-group mt-3 mb-2">
                                <div class="col-md-1">
                                    <label for="lotNumero">Lot Number</label>
                                    <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.lot_no">
                                </div>
                                
                                
                                <div class="col-md-1">
                                    <label for="lotSuperficie">AREA OF LOT</label>
                                    <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.lot_area">
                                </div>
            
                                <div class="col-md-1">
                                    <label for="lotEtat">State Of Lot</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.condition_lot">
                                </div>

                                <div class="col-md-1">
                                    <label for="lotNumero">LOT STATUS</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.lot_status">
                                </div>
            
                                <div class="col-md-1">
                                    <label for="lotSuperficie">NOTARY'S OFFICE</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.notary_office">
                                </div>
            
                                <div class="col-md-1">
                                    <label for="lotEtat">NOTARY'S CLERK</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.notary_clerk">
                                </div>

                                
                                <div class="col-md-2 pt-4">
                                    <label for="lotNumero">GEOMETRIC PRACTICE</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.geometric_pratic">
                                </div>
            
                                <div class="col-md-2 pt-4">
                                    <label for="lotSuperficie">GEOMETRICIAN</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.geometrician">
                                </div>
            
                                <div class="col-md-2 pt-4">
                                    <label for="lotEtat">Date</label>
                                    <input type="date" class="form-control" wire:model="blocks.{{ $blockIndex }}.lots.{{ $lotIndex }}.date">
                                </div>

                            </div>
            
                                <button type="button" wire:click="removeLot({{ $blockIndex }}, {{ $lotIndex }})" class="btn btn-danger">Remove Lot</button>
                            @endforeach
            
                            <button type="button" wire:click="addLot({{ $blockIndex }})" class="btn btn-primary">Add Lot</button>
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
                                    <input wire:model="subdivision.code" type="text"
                                        class="form-control  @error('subdivision.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="subdivision.code">
                                    @error('subdivision.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset> --}}

                        <div class="d-flex justify-content-end py-2">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
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
