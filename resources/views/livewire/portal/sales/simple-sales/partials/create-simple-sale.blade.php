<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUserModal" tabindex="-1" aria-labelledby="modal-form"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:70%;">
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
                                        value="{{ old('sales_code') }}" id="sales_code" autofocus="" required=""
                                        disabled>
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
                                        value="{{ old('public_utility_area') }}" placeholder="100"
                                        id="public_utility_area" autofocus="" required="">
                                    @error('public_utility_area')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col"><label for="area_sold">{{ __('AREA SOLD') }}</label>
                                    <input type="number" wire:model="area_sold"
                                        class="form-control  @error('area_sold') is-invalid @enderror "
                                        value="{{ old('area_sold') }}" placeholder="200" id="area_sold" autofocus=""
                                        required="">
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

                                <div class=" col">
                                    <div>
                                        <div class='d-flex justify-content-between align-items-center'>

                                            <label for="purchaser">{{ __('Id of purchaser(s)') }}</label>
                                            <button class="btn btn-primary" wire:click.prevent="addPurchaser">Add
                                                Purchaser</button>


                                        </div>
                                        <hr class="p-0 mt-2 mb-2">
                                        <div class='row'>
                                            <div class="col">
                                                <table class="table table-borderless align-items-center table-sm">
                                                    
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                @foreach ($inputs as $index => $value)
                                                                    <div>
                                                                        <input class="form-control" type="text"
                                                                            wire:model.defer="purchaser_name.{{ $index }}"
                                                                            placeholder="Purchaser Name {{ $index + 1 }}" />
                                                                            <br>
                                                                        @if ($index > 0)
                                                                            <button class="btn btn-danger btn-sm"
                                                                                wire:click.prevent="removePurchaser({{ $index }})">Remove</button>
                                                                        @endif
                                                                    </div>
                                                                @endforeach

                                                            </td>


                                                        </tr>

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
                                </div>

                                <div class="col">
                                    <label for="payment_type">{{ __('PAYMENT TYPE') }}</label>
                                    <select wire:model="payment_type"
                                        class="form-select @error('payment_type') is-invalid @enderror"
                                        id="payment_type" required="">
                                        <option value="cash" @if (old('payment_type') === 'cash') selected @endif>Cash
                                        </option>
                                        <option value="tranche" @if (old('payment_type') === 'tranche') selected @endif>
                                            Tranche</option>

                                    </select>
                                    @error('payment_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class='form-group row mb-3'>


                                <div class=" col"><label
                                        for="number_of_lots_sold">{{ __('NUMBER OF LOTS SOLD') }}</label>
                                    <input type="number" wire:model="number_of_lots_sold"
                                        class="form-control  @error('number_of_lots_sold') is-invalid @enderror "
                                        value="{{ old('number_of_lots_sold') }}" placeholder="300"
                                        id="number_of_lots_sold" autofocus="" required="">
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
                                        value="{{ old('number_of_lots_remaining') }}" placeholder="100"
                                        id="number_of_lots_remaining" autofocus="" required="">
                                    @error('number_of_lots_remaining')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class='form-group row mb-3'>
                                <div class=" col"><label for="price_per_m²">{{ __('Price(m²)') }}</label>
                                    <input type="number" wire:model="price_per_m²"
                                        class="form-control  @error('price_per_m²') is-invalid @enderror "
                                        value="{{ old('price_per_m²') }}" placeholder="3000" id="price_per_m²"
                                        autofocus="" required="">
                                    @error('price_per_m²')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col">
                                    <label for="surface_for_sale">{{ __('SURFACE FOR SALE') }}</label>
                                    <input type="number" wire:model="surface_for_sale"
                                        class="form-control  @error('surface_for_sale') is-invalid @enderror "
                                        value="{{ old('surface_for_sale') }}" placeholder="200"
                                        id="surface_for_sale" autofocus="" required="">
                                    @error('surface_for_sale')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class=" col"><label for="sale_amount">{{ __('Sale Amount') }}
                                        {{ __('XAF') }}</label>
                                    <input type="number" wire:model="sale_amount"
                                        class="form-control  @error('sale_amount') is-invalid @enderror "
                                        value="{{ old('sale_amount') }}" placeholder="0" id="sale_amount"
                                        autofocus="" required="" disabled>
                                    @error('sale_amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            @if ($payment_type === 'tranche')
                                <div class='form-group row mb-3'>
                                    <div class="col">
                                        <label for="advance">{{ __('Advance') }}</label>
                                        <input type="number" wire:model="advance"
                                            class="form-control @error('advance') is-invalid @enderror"
                                            value="{{ old('advance') }}" placeholder="0" id="advance"
                                            autofocus="" required="">
                                        @error('advance')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="balance">{{ __('Balance(CFA)') }}</label>
                                        <input type="text"class="form-control" id="balance" name="balance"
                                            value="{{ $balance ?? 0 }}" readonly>
                                        @error('balance')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <div class='form-group row mb-3'>
                                <div class=" col"><label for="observation">{{ __('Observations') }}</label>

                                    <textarea wire:model="observation" class="form-control @error('observation') is-invalid @enderror"
                                        placeholder="Edea" id="observation" autofocus="" required="">{{ old('observation') }}</textarea>
                                    @error('observation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror


                                </div>
                                <div class=" col"><label for="document">{{ __('Attarch a File') }}</label>
                                    <input type="file" wire:model="document"
                                        class="form-control  @error('document') is-invalid @enderror "
                                        value="{{ old('document') }}" placeholder="0" id="document" autofocus=""
                                        required="">

                                </div>
                            </div>

                        </fieldset>
                        <div>

                        </div>
                        <br>

                        <div class="d-flex justify-content-between align-items-end">
                            <div class="mb-4 mt-md-0">
                                <button type="button" class="btn btn-sm btn-light text-gray-800 ms-auto "
                                    data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <span wire:click="clearFields()"
                                        class="d-none d-sm-inline-block ms-1">{{ __('Close') }}</span>
                                </button>
                                <button type="submit" wire:click.prevent="store"
                                    class="btn btn-primary btn-sm btn-loading">
                                    <svg class="icon icon-xs" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Save & Print') }}</span>
                                </button>
                            </div>
                            <div class="col-auto fs-4">
                                <table class="table table-sm table-borderless fs--1 text-end">
                                    <tr>
                                        <th class="text-900">{{ __('Price(m²)') }} :</th>
                                        <td class="fw-semi-bold"> {{ number_format($price_per_m²) }}
                                            {{ __('XAF') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900">{{ __('SURFACE FOR SALE') }} </th>
                                        <td class="fw-semi-bold">{{ number_format($surface_for_sale) }}
                                            {{ __('m²') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900">{{ __('Balance') }}:</th>
                                        <td class="fw-semi-bold">{{ number_format(!empty($balance) ? $balance : 0) }}
                                            {{ __('XAF') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900">{{ __('Advance') }}:</th>
                                        <td class="fw-semi-bold">{{ number_format(!empty($advance) ? $advance : 0) }}
                                            {{ __('XAF') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900 h5">{{ __('Total Amount') }}:</th>
                                        <td class="fw-semi-bold   h5"> {{ number_format($sale_amount) }}
                                            {{ __('XAF') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </x-form-items.form>

                </div>
            </div>
        </div>
    </div>
</div>
