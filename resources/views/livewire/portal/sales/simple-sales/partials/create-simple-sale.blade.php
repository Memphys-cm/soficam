<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUserModal" tabindex="-1" aria-labelledby="modal-form"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:75%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Simple Land Sale') }}</h1>
                        <p class="px-1"> {{ __('selling a simple Land') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        
                            <fieldset class="border p-3">
                                <legend class="w-auto">Land Title Informations</legend>
                                <div class='form-group row mb-3'>
                                    <div class=" col"><label for="user">{{ __('Land Title Number') }}</label>
                                        <x-input.select wire:model="user" prettyname="user" :options="$user->pluck('first_name', 'id')->toArray()"
                                            selected="('user_id')" />
                                        @error('user')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
        
                                    <div class=" col"><label for="sales_code">{{ __('Code') }}</label>
                                        <input type="text" wire:model="sales_code"
                                            class="form-control  @error('sales_code') is-invalid @enderror "
                                            value="{{ old('sales_code') }}" id="sales_code" autofocus="" required="">
                                        @error('sales_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                </div>
                                <div class='form-group row mb-3'>
                                    <div class=" col"><label for="land_title_area">{{ __('LAND TITLE AREA') }}</label>
                                        <input type="number" wire:model="land_title_area"
                                            class="form-control  @error('land_title_area') is-invalid @enderror "
                                            value="{{ old('land_title_area') }}" placeholder="300" id="land_title_area"
                                            autofocus="" required="">
                                        @error('land_title_area')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label
                                            for="public_utility_area">{{ __('PUBLIC UTILITY AREA') }}</label>
                                        <input type="number" wire:model="public_utility_area"
                                            class="form-control  @error('public_utility_area') is-invalid @enderror "
                                            value="{{ old('public_utility_area') }}" placeholder="100" id="public_utility_area"
                                            autofocus="" required="">
                                        @error('public_utility_area')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="area_sold">{{ __('AREA SOLD') }}</label>
                                        <input type="number" wire:model="area_sold"
                                            class="form-control  @error('area_sold') is-invalid @enderror "
                                            value="{{ old('area_sold') }}" placeholder="200" id="area_sold"
                                            autofocus="" required="">
                                        @error('area_sold')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class='form-group row mb-3'>
                                    
                                    <div class=" col"><label for="remaining_area">{{ __('REMAINING AREA') }}</label>
                                        <input type="number" wire:model="remaining_area"
                                            class="form-control  @error('remaining_area') is-invalid @enderror "
                                            value="{{ old('remaining_area') }}" placeholder="Edea" id="remaining_area"
                                            autofocus="" required="">
                                        @error('remaining_area')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="number_of_blocks">{{ __('NUMBER OF BLOCKS') }}</label>
                                        <input type="number" wire:model="number_of_blocks"
                                            class="form-control  @error('number_of_blocks') is-invalid @enderror "
                                            value="{{ old('number_of_blocks') }}" placeholder="Edea" id="number_of_blocks"
                                            autofocus="" required="">
                                        @error('number_of_blocks')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="number_of_lots">{{ __('NUMBER OF LOTS') }}</label>
                                        <input type="number" wire:model="number_of_lots"
                                            class="form-control  @error('number_of_lots') is-invalid @enderror "
                                            value="{{ old('number_of_lots') }}" placeholder="200" id="number_of_lots"
                                            autofocus="" required="">
                                        @error('number_of_lots')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            
                            <fieldset class="border p-3">
                                <legend class="w-auto">Sale Information</legend>
                                
                                <div class='form-group row mb-3'>
                                    <div class=" col"><label for="number_of_lots_sold">{{ __('NUMBER OF LOTS SOLD') }}</label>
                                        <input type="number" wire:model="number_of_lots_sold"
                                            class="form-control  @error('number_of_lots_sold') is-invalid @enderror "
                                            value="{{ old('number_of_lots_sold') }}" placeholder="300" id="number_of_lots_sold"
                                            autofocus="" required="">
                                        @error('number_of_lots_sold')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class=" col"><label
                                            for="number_of_lots_remaining">{{ __('NUMBER OF LOTS REMAINING') }}</label>
                                        <input type="number" wire:model="number_of_lots_remaining"
                                            class="form-control  @error('number_of_lots_remaining') is-invalid @enderror "
                                            value="{{ old('number_of_lots_remaining') }}" placeholder="100" id="number_of_lots_remaining"
                                            autofocus="" required="">
                                        @error('number_of_lots_remaining')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="lotisser">{{ __('LOTISSER') }}</label>
                                        <input type="number" wire:model="lotisser"
                                            class="form-control  @error('lotisser') is-invalid @enderror "
                                            value="{{ old('lotisser') }}" placeholder="200" id="lotisser"
                                            autofocus="" required="">
                                        @error('lotisser')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class='form-group row mb-3'>
                                    
                                    <div class=" col"><label for="geometric_office">{{ __('THE GEOMETRISTS OFFICE') }}</label>
                                        <input type="number" wire:model="geometric_office"
                                            class="form-control  @error('geometric_office') is-invalid @enderror "
                                            value="{{ old('geometric_office') }}" placeholder="Edea" id="geometric_office"
                                            autofocus="" required="">
                                        @error('geometric_office')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="geometer">{{ __('THE GEOMETER') }}</label>
                                        <input type="number" wire:model="geometer"
                                            class="form-control  @error('geometer') is-invalid @enderror "
                                            value="{{ old('geometer') }}" placeholder="Edea" id="geometer"
                                            autofocus="" required="">
                                        @error('geometer')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="urbanist">{{ __('THE URBANIST') }}</label>
                                        <input type="number" wire:model="urbanist"
                                            class="form-control  @error('urbanist') is-invalid @enderror "
                                            value="{{ old('urbanist') }}" placeholder="200" id="urbanist"
                                            autofocus="" required="">
                                        @error('urbanist')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                
                                
                                <div>
                                    <div class='d-flex justify-content-between align-items-center'>
                
                                        <label for="purchaser">{{ __('Id of purchaser(s)') }}</label>
                                        <button type="button" class="btn btn-info btn-sm" wire:click.prevent="addPurchaser({{ $i }})">{{ __('Add') }}</button>
                
                                    </div>
                                    <hr class="p-0 mt-2 mb-2">
                                    <div class='row'>
                                        <div class="col">
                                            <table class="table table-borderless align-items-center table-sm">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>{{ __('Name') }}<span class=" @error('purchaser_name.*')  text-danger @enderror">*</span></th>
                                                        <th>{{ __('Address') }}</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" wire:model.defer="purchaser_name.0" class="form-control" placeholder="{{ __('Name') }}"></td>
                                                        <td><input type="text" wire:model.defer="purchaser_address.0" class="form-control" placeholder="{{ __('Address') }}"></td>
                                                        </td>
                                                        
                                                    </tr>
                                                    @foreach ($inputs as $key => $value)
                                                    <tr>
                                                        <td><input type="text" wire:model.defer="purchaser_name.{{ $value }}" class="form-control" placeholder="{{ __('Name') }}">
                                                        </td>
                                                        
                                                        <td><input type="text" wire:model.defer="purchaser_address.{{ $value }}" class="form-control" placeholder="{{ __('Address') }}">
                                                        </td>
                                                        
                                                        <td>
                                                            <a href=" #" class="" wire:click.prevent="removePurchaser({{ $key }})">
                                                                <svg class="icon icon-xs text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                
                                                </tbody>
                                                <tfoot>
                                                    <tr class="d-flex align-items-end">
                                                        <td colspan="4" class="text-right">
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
 
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
