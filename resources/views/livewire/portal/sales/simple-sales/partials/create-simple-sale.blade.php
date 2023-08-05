<div wire:ignore.self class="modal side-layout-modal fade" id="CreatesimplesaleModal" tabindex="-1" aria-labelledby="modal-form"
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


                                
                                <div class=" col"><label for="titre_foncier_id">{{ __('Land Title Number') }}</label>
                                    <x-input.select wire:model="titre_foncier_id" prettyname="titre_foncier" :options="$titre_fonciers->pluck('numero_titre_foncier', 'id')->toArray()"
                                        selected="('titre_foncier_id')" />
                                    @error('titre_foncier_id')
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

                                <div class=" col"><label for="notary_id">{{ __('NOTARY') }}</label>
                                    <x-input.select wire:model="notary_id" prettyname="notary" :options="$notarys->pluck('name', 'id')->toArray()"
                                        selected="('notary_id')" />
                                    @error('notary_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class='form-group row mb-3'>
                                <div class=" col"><label for="first_name">{{ __('LAND TITLE AREA') }}</label>
                                    <input type="text" wire:model="first_name"
                                        class="form-control  @error('first_name') is-invalid @enderror "
                                        value="{{ old('first_name') }}" placeholder="" id="first_name" autofocus=""
                                        required="" disabled>
                                    @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class=" col"><label for="last_name">{{ __('PUBLIC UTILITY AREA') }}</label>
                                    <input type="text" wire:model="last_name"
                                        class="form-control  @error('last_name') is-invalid @enderror "
                                        value="{{ old('last_name') }}" placeholder="" id="last_name" autofocus=""
                                        required="" disabled>
                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col"><label for="email">{{ __('AREA SOLD') }}</label>
                                    <input type="text" wire:model="email"
                                        class="form-control  @error('email') is-invalid @enderror "
                                        value="{{ old('email') }}" placeholder="" id="email" autofocus=""
                                        required="" disabled>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-group row mb-3'>

                                <div class=" col"><label for="address">{{ __('REMAINING AREA') }}</label>
                                    <input type="text" wire:model="address"
                                        class="form-control  @error('address') is-invalid @enderror "
                                        value="{{ old('address') }}" placeholder="" id="address" autofocus=""
                                        required="" disabled>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col"><label for="date_of_birth">{{ __('NUMBER OF BLOCKS') }}</label>
                                    <input type="text" wire:model="date_of_birth"
                                        class="form-control  @error('date_of_birth') is-invalid @enderror "
                                        value="{{ old('date_of_birth') }}" placeholder="" id="date_of_birth"
                                        autofocus="" required="" disabled>
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col"><label for="place_of_birth">{{ __('NUMBER OF LOTS') }}</label>
                                    <input type="text" wire:model="place_of_birth"
                                        class="form-control  @error('place_of_birth') is-invalid @enderror "
                                        value="{{ old('place_of_birth') }}" placeholder="" id="place_of_birth"
                                        autofocus="" required="" disabled>
                                    @error('place_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-group row mb-3'>
                                <div class=" col"><label for="region_id">{{ __('Region') }}</label>
                                    <input type="text" wire:model="region_id"
                                        class="form-control  @error('region_id') is-invalid @enderror "
                                        value="{{ old('region_id') }}" placeholder="" id="region_id"
                                        autofocus="" required="" disabled>
                                    @error('region_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col"><label for="division_id">{{ __('Division') }}</label>
                                    <input type="text" wire:model="division_id"
                                        class="form-control  @error('division_id') is-invalid @enderror "
                                        value="{{ old('division_id') }}" placeholder="" id="division_id"
                                        autofocus="" required="" disabled>
                                    @error('division_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col"><label for="sub_division_id">{{ __('SubDivision') }}</label>
                                    <input type="text" wire:model="sub_division_id"
                                        class="form-control  @error('sub_division_id') is-invalid @enderror "
                                        value="{{ old('sub_division_id') }}" placeholder="" id="sub_division_id"
                                        autofocus="" required="" disabled>
                                    @error('sub_division_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                               
                            </div>
                            
                            <div class='form-group row mb-3'>
                                <div class=" col"><label for="lieu_dit">{{ __('Village') }}</label>
                                    <input type="text" wire:model="lieu_dit"
                                        class="form-control  @error('lieu_dit') is-invalid @enderror "
                                        value="{{ old('lieu_dit') }}" placeholder="" id="lieu_dit"
                                        autofocus="" required="" disabled>
                                    @error('lieu_dit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col"><label for="superficie_du_TF_mere">{{ __('LAND TITLE AREA') }}</label>
                                    <input type="text" wire:model="superficie_du_TF_mere"
                                        class="form-control  @error('superficie_du_TF_mere') is-invalid @enderror "
                                        value="{{ old('superficie_du_TF_mere') }}" placeholder="" id="superficie_du_TF_mere" autofocus=""
                                        required="" disabled>
                                    @error('superficie_du_TF_mere')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class=" col"><label for="numero_titre_foncier">{{ __('PUBLIC UTILITY AREA') }}</label>
                                    <input type="text" wire:model="numero_titre_foncier"
                                        class="form-control  @error('numero_titre_foncier') is-invalid @enderror "
                                        value="{{ old('numero_titre_foncier') }}" placeholder="" id="numero_titre_foncier" autofocus=""
                                        required="" disabled>
                                    @error('numero_titre_foncier')
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

                                            <label for="purchaser_name">{{ __('Id of purchaser(s)') }}</label>
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
                                        <option value="">{{ __('-- select payment type --') }}
                                        </option>
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
                                        value="{{ old('number_of_lots_sold') }}" placeholder="0"
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
                                        value="{{ old('number_of_lots_remaining') }}" placeholder="0"
                                        id="number_of_lots_remaining" autofocus="" required="">
                                    @error('number_of_lots_remaining')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class='form-group row mb-3'>
                                <div class=" col"><label for="price_per_m²">{{ __('Price(m²)*') }}</label>
                                    <input type="number" wire:model="price_per_m²"
                                        class="form-control  @error('price_per_m²') is-invalid @enderror "
                                        value="{{ old('price_per_m²') }}" placeholder="0" id="price_per_m²"
                                        autofocus="" required="">
                                    @error('price_per_m²')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" col">
                                    <label for="superficie_du_TF_mere">{{ __('AREA SOLD') }}</label>
                                    <input type="number" wire:model="superficie_du_TF_mere"
                                        class="form-control  @error('superficie_du_TF_mere') is-invalid @enderror "
                                        value="{{ old('superficie_du_TF_mere') }}" placeholder="0" id="superficie_du_TF_mere"
                                        autofocus="" required="" disabled>
                                    @error('superficie_du_TF_mere')
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
                                <div class="col">
                                    <label for="document">{{ __('Attach a File') }}</label>
                                    <input type="file" wire:model="document"
                                        class="form-control @error('document') is-invalid @enderror" placeholder="0"
                                        id="document" autofocus required="">
                                    @error('document')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Save') }}</span>
                                </button>
                            </div>
                            <div class="col-auto fs-4">
                                <table class="table table-sm table-borderless fs--1 text-end">
                                    <tr>
                                        <th class="text-900">{{ __('Price(m²)') }} :</th>
                                        <td class="fw-semi-bold"> {{ number_format(floatval($price_per_m²)) }}
                                            {{ __('XAF') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900">{{ __('SURFACE FOR SALE') }} </th>
                                        <td class="fw-semi-bold">{{ number_format(floatval($superficie_du_TF_mere)) }}
                                            {{ __('m²') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900">{{ __('Balance') }}:</th>
                                        <td class="fw-semi-bold">
                                            {{ number_format(!empty($balance) ? floatval($balance) : 0) }}
                                            {{ __('XAF') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900">{{ __('Advance') }}:</th>
                                        <td class="fw-semi-bold">
                                            {{ number_format(!empty($advance) ? floatval($advance) : 0) }}
                                            {{ __('XAF') }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-900 h5">{{ __('Total Amount') }}:</th>
                                        <td class="fw-semi-bold   h5"> {{ number_format(floatval($sale_amount)) }}
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
