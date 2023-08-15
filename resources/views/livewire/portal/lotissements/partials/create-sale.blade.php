<div wire:ignore.self class="modal side-layout-modal fade" id="CreateLotSaleModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ 'Sell' }} {{ __(' Lot') }}</h1>
                        <p class="px-1"> {{ 'Sell' }} {{ __(' ELot') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="payment_method">{{ __('PAYMENT METHOD') }}</label>
                                <select wire:model="payment_method" class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" required="">
                                    <option value="">{{ __('-- select payment type --') }}</option>
                                    <option value="cash" selected>{{ __('Cash') }}</option>
                                    <option value="tranche">{{ __('Tranche') }}</option>
                                </select>
                                @error('payment_method')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col">
                                <label for="price_per_m²">{{ __('Price(m²)*') }}</label>
                                <input type="number" wire:model="price_per_m²" class="form-control  @error('price_per_m²') is-invalid @enderror " value="{{ old('price_per_m²') }}" placeholder="0" id="price_per_m²" autofocus="" required="">
                                @error('price_per_m²')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row mb-3'>
                            <div class=" col">
                                <label for="superficie_du_TF_mere">{{ __('AREA SOLD') }}</label>
                                <input type="number" wire:model="superficie_du_TF_mere" class="form-control  @error('superficie_du_TF_mere') is-invalid @enderror " value="{{ old('superficie_du_TF_mere') }}" placeholder="0" id="superficie_du_TF_mere" autofocus="" required="" disabled>
                                @error('superficie_du_TF_mere')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="sale_amount">{{ __('Sale Amount') }}
                                    {{ __('XAF') }}</label>
                                <input type="number" wire:model="sale_amount" class="form-control  @error('sale_amount') is-invalid @enderror " value="{{ old('sale_amount') }}" placeholder="0" id="sale_amount" autofocus="" required="" disabled>
                                @error('sale_amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="commentaires">{{ __('Commentaires') }}</label>
                                <textarea rows="3" wire:model="commentaires" class="form-control @error('commentaires') is-invalid @enderror" placeholder="Edea" id="commentaires" autofocus="" required="">{{ old('commentaires') }}</textarea>
                                @error('commentaires')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="col-auto">
                                <div class="text-end">
                                    <div class="d-flex my-1">
                                        <div class="me-2">{{ __('Price(m²)') }} :</div>
                                        <div class="fw-semi-bold"> {{ number_format(floatval($price_per_m²)) }}
                                            {{ __('XAF') }}
                                        </div>
                                    </div>
                                    <div class="d-flex my-1">
                                        <div class=" me-2">{{ __('SURFACE FOR SALE') }} : </div>
                                        <div class="fw-semi-bold">{{ number_format(floatval($superficie_du_TF_mere)) }}
                                            {{ __('m²') }}
                                        </div>
                                    </div>

                                    <div class="d-flex border-top border-2 my-1 py-2">
                                        <div class=" h5 me-2">{{ __('Total Amount') }}:</div>
                                        <div class="fw-semi-bold   h5"> {{ number_format(floatval($sale_amount)) }}
                                            {{ __('XAF') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 mt-md-0">
                                <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-sm btn-loading">
                                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Save') }}</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="code">{{ __('Commentaires') }}</label>
                            <textarea wire:model="commentaires" class="form-control  @error('commentaires') is-invalid @enderror" name="" id="" cols="30" rows="3">
                                    </textarea>
                            @error('commentaires')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end py-2">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{__('Sell') }} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>