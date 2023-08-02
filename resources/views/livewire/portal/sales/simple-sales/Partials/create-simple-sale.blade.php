<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUserModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:65%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Simple Land Sale')}}</h1>
                        <p class="px-1"> {{__('selling a simple Land')}} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        

                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="land_title_number">{{ __('Land Title Number') }}</label>
                                <input type="text" wire:model="land_title_number" class="form-control  @error('land_title_number') is-invalid @enderror " value="{{ old('land_title_number') }}" placeholder="Jane" id="land_title_number" autofocus="" required="">
                                @error('land_title_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="land_title_area">{{ __('LAND TITLE AREA') }}</label>
                                <input type="text" wire:model="land_title_area" class="form-control  @error('land_title_area') is-invalid @enderror " value="{{ old('land_title_area') }}" placeholder="Doe" id="land_title_area" autofocus="" required="">
                                @error('land_title_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="public_utility_area">{{ __('PUBLIC UTILITY AREA') }}</label>
                                <input type="text" wire:model="public_utility_area" class="form-control  @error('public_utility_area') is-invalid @enderror " value="{{ old('public_utility_area') }}" placeholder="112233445566" id="public_utility_area" autofocus="" required="">
                                @error('public_utility_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="useable_area">{{ __('USABLE AREA') }}</label>
                                <input type="text" wire:model="useable_area" class="form-control  @error('useable_area') is-invalid @enderror " value="{{ old('useable_area') }}" placeholder="Edea" id="useable_area" autofocus="" required="">
                                @error('useable_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                         <div class='form-group row mb-3'>
                            <div class="form-group mb-3"><label for="area_sold">{{ __('AREA SOLD') }}</label>
                            <input type="text" wire:model="area_sold" class="form-control  @error('area_sold') is-invalid @enderror " value="{{ old('area_sold') }}" placeholder="Edea" id="area_sold" autofocus="" required="">
                            @error('area_sold')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                            <div class=" col"><label for="useable_area">{{ __('USABLE AREA') }}</label>
                                <input type="text" wire:model="useable_area" class="form-control  @error('useable_area') is-invalid @enderror " value="{{ old('useable_area') }}" placeholder="Edea" id="useable_area" autofocus="" required="">
                                @error('useable_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="remaining_area">{{ __('REMAINING AREA') }}</label>
                                <input type="text" wire:model="remaining_area" class="form-control  @error('remaining_area') is-invalid @enderror " value="{{ old('remaining_area') }}" placeholder="6xxxxxxxx" id="remaining_area" autofocus="" required="">
                                @error('remaining_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="secondary_phone_number">{{ __('Alternative Phone Number') }}</label>
                                <input type="text" wire:model="secondary_phone_number" class="form-control  @error('secondary_phone_number') is-invalid @enderror " value="{{ old('secondary_phone_number') }}" placeholder="Doe" id="secondary_phone_number" autofocus="" required="">
                                @error('secondary_phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="address">{{ __('Address') }}</label>
                                <input type="text" wire:model="address" class="form-control  @error('address') is-invalid @enderror " value="{{ old('address') }}" placeholder="{{__('Carefour Eto')}}" id="address" autofocus="" required="">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="email">{{ __('Email Address') }}</label>
                                <input type="email" wire:model="email" class="form-control  @error('email') is-invalid @enderror " value="{{ old('email') }}" placeholder="jane.doe@app.com" id="email" autofocus="" required="">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-4'>
                            <div class=" col"><label for="password">{{ __('Password') }}</label>
                                <input type="password" wire:model="password" class="form-control  @error('password') is-invalid @enderror " autofocus="" required="">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <input type="password" wire:model="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror " id="password_confirmation" autofocus="" required="">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-4 px-1'>
                            <div class="form-check">
                                <input class="form-check-input  " type="checkbox" value="" wire:model="is_active" id="is_active">
                                <label class="form-check-label mb-0" for="is_active">{{ __('Mark as Active') }}</label>
                            </div>
                          </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary" wire:loading.attr="disabled">{{__('Create')}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>