<div>
    <x-alert />
    <x-delete-modal />
    <x-form-items.form wire:submit="store">
        <div class='p-0'>
            <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
                <div class="mb-lg-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item">
                                <a href="#">
                                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="/">{{__('Dashboard')}}</a></li>
                            <li class="breadcrumb-item "><a href="{{route('portal.lotissements.create')}}">{{__('Lotissements')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Create')}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between my-3">

                    <a type="submit" wire:click.prevent="store" class="btn btn-primary ms-auto mx-3" wire:loading.attr="disabled">{{ __('Save') }} </a>
                    <a href="{{route('portal.lotissements.index')}}" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600 ">{{ __('Close') }}</a>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-3'>
                <div class="card p-3">
                    <h5 class="w-auto">{{__('Creating Lotissement')}}</h5>
                    <ul>
                        <li>{{__('Record Land information')}}</li>
                        <li>{{__('Record Promoter information')}}</li>
                        <li>{{__('Add Blocks')}}</li>
                        <li>{{__('Add Parcels (lots) informations ')}}</li>
                    </ul>
                </div>
            </div>
            <div class='col-md-9'>
                <div class="card p-4 mb-3">
                    <legend class="w-auto">Informations on the Land</legend>
                    <div class='row form-group mb-3'>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Land Title Number') }}</label>
                            <x-input.land_title-select wire:model="titre_foncier_id" prettyname="titre_foncier_id" :options="$titre_fonciers" selected="('titre_foncier_id')" />
                            @error('titre_foncier_id')
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
                </div>
                <div class="card p-4 ">
                    <div class='mb-2'>
                        <button type="button" wire:click="addBlock" class="btn btn-primary">{{__('Add Block')}}</button>
                    </div>
                    @foreach($blocks as $blockIndex => $block)
                    <fieldset class="border p-3 mb-3 rounded">
                        <legend class="w-auto">{{ $block['block_name'] }}</legend>
                        <div class='d-flex justify-content-between align-items-end'>
                            <div class="form-group ">
                                <div class=''>
                                    <label for="blockName">{{__('Block')}} {{$blockIndex+1 }} {{__('Name')}}</label>
                                    <input type="text" class="form-control px-4  @error('blocks.{{ $blockIndex }}.block_name') is-invalid @enderror" wire:model="blocks.{{ $blockIndex }}.name" width="5rem;" placeholder="{{'Block No. '.$blockIndex+1}}">
                                    @error('blocks.{{ $blockIndex }}.block_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <button type="button" wire:click="addLot({{ $blockIndex }})" class="btn btn-sm btn-primary">
                                    <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    {{__('Lot')}}
                                </button>
                                <button type="button" wire:click="addLotPublic({{ $blockIndex }})" class="btn btn-sm btn-primary">
                                    <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>{{__('Lot Public')}}
                                </button>
                                <button type="button" wire:click="removeBlock({{ $blockIndex }})" class="btn btn-sm btn-danger">
                                    <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>

                                    {{__('Block')}}
                                </button>
                            </div>
                        </div>
                        <hr>
                        @foreach($block['parcels'] as $lotIndex => $lot)
                        @if ($lot['type'] != 'public')

                        <div class="row form-group mt-3 mb-2">
                            <div class="col-md-3">
                                <label for="numero_du_lot">{{__('Lot Number')}}</label>
                                <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.numero_du_lot">
                            </div>

                            <div class="col-md-3">
                                <label for="surperficie_du_lot">AREA OF LOT</label>
                                <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.surperficie_du_lot">
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
                        @if(!$loop->last)
                        <hr> @endif
                        @endforeach
                    </fieldset>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-between my-3">
                <a type="submit" wire:click.prevent="store" class="btn btn-primary ms-auto mx-3" wire:loading.attr="disabled">{{ __('Save') }} </a>
                <a href="{{route('portal.lotissements.index')}}" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600 ">{{ __('Close') }}</a>
            </div>
        </div>
    </x-form-items.form>
</div>