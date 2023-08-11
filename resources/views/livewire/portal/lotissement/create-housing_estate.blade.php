<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateHousingEstateModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:85%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ $state ? 'Update' : 'Create' }} {{ __(' Housing Estate') }}</h1>
                        <p class="px-1"> {{ $state ? 'Update' : 'Create' }} {{ __(' Housing Estate') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <fieldset class="border p-3 rounded">
                            <legend class="w-auto">Informations on the ground</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Land Title Number') }}</label>
                                    <x-input.land_title-select wire:model="land_id" prettyname="land_id" :options="$land_titles" selected="('land_id')" />
                                    @error('land_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Land Title Area') }}</label>
                                    <input wire:model="area" type="text" class="form-control  @error('area') is-invalid @enderror" placeholder="NW" required="" value="" name="area" disabled>
                                    @error('housing_estate.code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Area sold') }}</label>
                                    <input wire:model="area_solde" type="text" class="form-control  @error('area_solde') is-invalid @enderror" placeholder="NW" required="" value="" name="area_solde" disabled>
                                    @error('area_solde')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('remaning_area') }}</label>
                                    <input wire:model="remaning_area" type="text" class="form-control  @error('remaning_area') is-invalid @enderror" placeholder="NW" required="" value="" name="remaning_area" disabled>
                                    @error('remaning_area')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-3 my-2 rounded">
                            <legend class="w-auto">{{__('Promoter Informations')}}</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Maeture') }}</label>
                                    <input wire:model="housing_estate.maeture" type="text" class="form-control  @error('housing_estate.maeture') is-invalid @enderror" placeholder="maeture" required="" value="" name="housing_estate.maeture">
                                    @error('housing_estate.maeture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Developer') }}</label>
                                    <input wire:model="housing_estate.property_developer" type="text" class="form-control  @error('housing_estate.property_developer') is-invalid @enderror" placeholder="..." required="" value="" name="housing_estate.property_developer">
                                    @error('housing_estate.property_developer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Real Estate Agent') }}</label>
                                    <input wire:model="housing_estate.estate_agent" type="text" class="form-control  @error('housing_estate.estate_agent') is-invalid @enderror" placeholder="..." required="" value="" name="housing_estate.estate_agent">
                                    @error('housing_estate.estate_agent')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Lotisser') }}</label>
                                    <input wire:model="housing_estate.lotisser" type="text" class="form-control  @error('housing_estate.lotisser') is-invalid @enderror" placeholder="lotisser" required="" value="" name="housing_estate.lotisser">
                                    @error('housing_estate.lotisser')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Geometric Pratice') }}</label>
                                    <input wire:model="housing_estate.geometric_pratice" type="text" class="form-control  @error('housing_estate.geometric_pratice') is-invalid @enderror" placeholder="geometric_pratice" required="" value="" name="housing_estate.geometric_pratice">
                                    @error('housing_estate.geometric_pratice')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Geometric') }}</label>
                                    <input wire:model="housing_estate.geometric" type="text" class="form-control  @error('housing_estate.geometric') is-invalid @enderror" placeholder="geometric" required="" value="" name="housing_estate.geometric">
                                    @error('housing_estate.geometric')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('Urban Planner') }}</label>
                                    <input wire:model="housing_estate.urbanist" type="text" class="form-control  @error('housing_estate.urbanist') is-invalid @enderror" placeholder="urbanist" required="" value="" name="housing_estate.urbanist">
                                    @error('housing_estate.urbanist')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 py-2">
                                    <label for="code">{{ __('controller') }}</label>
                                    <input wire:model="housing_estate.controller" type="text" class="form-control  @error('housing_estate.controller') is-invalid @enderror" placeholder="controller" required="" value="" name="housing_estate.controller">
                                    @error('housing_estate.controller')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        @foreach($blocks as $blockIndex => $block)
                        <fieldset class="border p-3 mb-3 rounded">
                            <legend class="w-auto">{{ $block['name'] }}</legend>

                            <div class='d-flex justify-content-between align-items-end'>
                                <div class="form-group ">
                                    <div class=''>
                                        <label for="blockName">Block Name</label>
                                        <input type="text" class="form-control px-4" wire:model="blocks.{{ $blockIndex }}.name" width="5rem;">
                                    </div>
                                </div>
                                <div>
                                    <button type="button" wire:click="addLot({{ $blockIndex }})" class="btn btn-sm btn-primary">
                                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        {{__('Lot')}}
                                    </button>
                                    <button type="button" wire:click="addLotPublic({{ $blockIndex }})" class="btn btn-sm btn-primary">
                                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>{{__('Lot Public')}}
                                    </button>
                                    <button type="button" wire:click="removeBlock({{ $blockIndex }})" class="btn btn-sm btn-danger">
                                        Remove Block
                                    </button>
                                </div>
                            </div>
                            <hr>

                            @foreach($block['parcels'] as $lotIndex => $lot)
                            @if ($lot['type'] != 'public')

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
                                    <label for="lotEtat">State Of Lot</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.condition_lot">
                                </div>

                                <div class="col-md-3">
                                    <label for="lotNumero">LOT STATUS</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_status">
                                </div>
                            </div>
                            <div class="row form-group mt-3 mb-2">
                                <div class="col-md-3">
                                    <label for="parcelsuperficie">NOTARY'S OFFICE</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.notary_office">
                                </div>

                                <div class="col-md-3">
                                    <label for="lotEtat">NOTARY'S CLERK</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.notary_clerk">
                                </div>


                                <div class="col-md-3">
                                    <label for="lotNumero">GEOMETRIC PRACTICE</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.geometric_pratic">
                                </div>

                                <div class="col-md-3">
                                    <label for="parcelsuperficie">GEOMETRICIAN</label>
                                    <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.geometrician">
                                </div>
                            </div>
                            <div class="col-md-12 pb-2">
                                <label for="lotEtat">Date</label>
                                <input type="date" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.date">
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
                            <div class='d-flex justify-content-end'>
                                <button type="button" wire:click="removeLot({{ $blockIndex }}, {{ $lotIndex }})" class="btn btn-sm btn-icon btn-danger">
                                    <svg class="icon icon-sm text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <hr>
                            @endforeach

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
                                <input wire:model="housing_estate.code" type="text" class="form-control  @error('housing_estate.code') is-invalid @enderror" placeholder="NW" required="" value="" name="housing_estate.code">
                                @error('housing_estate.code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        </fieldset> --}}

                        <div class="d-flex justify-content-end py-2">
                            <button type="button" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ $state ? 'Update' : 'Create' }} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>