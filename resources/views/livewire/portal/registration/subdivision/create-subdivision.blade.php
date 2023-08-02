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
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Land Title Area') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Public Usable Area') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Usable Area') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Area sold') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Remaining Area') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Bloc Number') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Lot Number') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-3 my-2">
                            <legend class="w-auto">{{__('Promoter Informations')}}</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Master') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Developer') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Agent') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Developer') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Surveyor\'s Office') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Surveyor') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Urban Planner') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('controller') }}</label>
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
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
                                    <input wire:model="service.code" type="text"
                                        class="form-control  @error('service.code') is-invalid @enderror"
                                        placeholder="NW" required="" value="" name="service.code">
                                    @error('service.code')
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
