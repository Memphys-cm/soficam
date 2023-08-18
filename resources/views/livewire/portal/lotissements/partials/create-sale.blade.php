<div wire:ignore.self class="modal side-layout-modal fade" id="CreateLotSaleModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-widdiv:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ 'Sell' }} {{ __(' Lot') }}</h1>
                        <p class="px-1"> {{ 'Sell' }} {{ __(' ELot') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <div class='form-group row mb-2'>
                            <div class='col'>
                                <label class="px-2" for="user_ids">{{ __('Propriators') }}</label>
                                <x-input.selectmultipleusers wire:model="user_ids" prettyname="user_ids"
                                    :options="$users" selected="('user_ids')" multiple="multiple" />
                                @error('user_ids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class='form-group row mb-3'>

                            <div class="col-md-6 ">
                                <label for="code">{{ __('Notaire') }}</label>
                                <select class="form-select" wire:model="notaire_id"
                                    class="form-control @error('notaire_id') is-invalid @enderror">
                                    <option value=''>{{ __('-- Select --') }}</option>
                                    @foreach ($notaires as $notaire)
                                        <option wire:key="{{ $notaire->id }}" value='{{ $notaire->id }}'>
                                            {{ !empty($notaire->cabinet) ? $notaire->cabinet->nom_cabinet : '' }} -
                                            {{ ucfirst($notaire->first_name) }} {{ ucfirst($notaire->last_name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('notaire_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="superficie_a_vendre">{{ __('Sup a Vendre') }}</label>
                                <select wire:model="superficie_a_vendre"
                                    class="form-select @error('superficie_a_vendre') is-invalid @enderror"
                                    id="superficie_a_vendre" required="">
                                    <option value="">{{ __('-- select superficie type --') }}
                                    </option>
                                    <option value="totale" @if (old('superficie_a_vendre') === 'total') selected @endif>Total
                                    </option>
                                    <option value="partielle" @if (old('superficie_a_vendre') === 'partielle') selected @endif>
                                        Partielle</option>
                                </select>
                                @error('payment_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row mb-3'>

                            <div class="col">
                                <label for="type_de_versement">{{ __('Type de Versement') }}</label>
                                <select wire:model="type_de_versement"
                                    class="form-select @error('type_de_versement') is-invalid @enderror"
                                    id="type_de_versement" required="">
                                    
                                    <option value="cash" @if (old('type_de_versement') === 'cash') selected @endif>Cash
                                    </option>
                                    <option value="tranche" @if (old('type_de_versement') === 'tranche') selected @endif>
                                        Tranche</option>
    
                                </select>
                                @error('payment_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class=" col">
                                <label for="price_per_m²">{{ __('Price(m²)*') }}</label>
                                <input type="number" wire:model="price_per_m²"
                                    class="form-control  @error('price_per_m²') is-invalid @enderror "
                                    value="{{ old('price_per_m²') }}" placeholder="0" id="price_per_m²" autofocus=""
                                    required="">
                                @error('price_per_m²')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        @if ($superficie_a_vendre === 'partielle')
                            <div class='form-group row mb-3'>
                                <div class="col">
                                    <label for="superficie_vendu">{{ __('Superficie Vendu') }}</label>
                                    <input type="number" wire:model="superficie_vendu"
                                        class="form-control @error('superficie_vendu') is-invalid @enderror"
                                        value="{{ old('superficie_vendu') }}" placeholder="0" id="superficie_vendu"
                                        autofocus="" required="">
                                    @error('superficie_vendu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="superficie_restant">{{ __('Superficie Restant') }}</label>
                                    <input type="text"class="form-control" id="superficie_restant"
                                        name="superficie_restant" value="{{ $superficie_restant ?? 0 }}" readonly>
                                    @error('superficie_restant')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class='form-group row mb-3'>
                            <div class=" col">
                                <label for="superficie_du_TF_mere">{{ __('TOTAL SURFACE') }}</label>
                                <input type="number" wire:model="superficie_du_TF_mere"
                                    class="form-control  @error('superficie_du_TF_mere') is-invalid @enderror "
                                    value="{{ old('superficie_du_TF_mere') }}" placeholder="0"
                                    id="superficie_du_TF_mere" autofocus="" required="" disabled>
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
                        

                      
                        @if ($type_de_versement === 'tranche')
                            <div class='form-group row mb-3'>
                                <div class="col">
                                    <label for="montant_versee">{{ __('Montant Versee(XAF)') }}</label>
                                    <input type="number" wire:model="montant_versee"
                                        class="form-control @error('montant_versee') is-invalid @enderror"
                                        value="{{ old('montant_versee') }}" placeholder="0" id="montant_versee"
                                        autofocus="" required="">
                                    @error('montant_versee')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="montant_restant">{{ __('Montant Restant(XAF)') }}</label>
                                    <input type="text"class="form-control" id="montant_restant"
                                        name="montant_restant" value="{{ $montant_restant ?? 0 }}" readonly>
                                    @error('montant_restant')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="commentaire_du_notaire">{{ __('Commentaire') }}</label>
                                <textarea rows="3" wire:model="commentaire_du_notaire"
                                    class="form-control @error('commentaire_du_notaire') is-invalid @enderror" placeholder="Edea"
                                    id="commentaire_du_notaire" autofocus="" required="">{{ old('commentaire_du_notaire') }}</textarea>
                                @error('commentaire_du_notaire')
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
                                    @if ($superficie_a_vendre === 'partielle')
                                        <div class="d-flex my-1">
                                            <div class=" me-2">{{ __('Superficie Vendu') }} : </div>
                                            <div class="fw-semi-bold">
                                                {{ number_format(floatval($superficie_vendu)) }}
                                                {{ __('m²') }}
                                            </div>
                                        </div>
                                        <div class="d-flex my-1">
                                            <div class=" me-2">{{ __('Superficie Restant') }} : </div>
                                            <div class="fw-semi-bold">
                                                {{ number_format(floatval($superficie_restant)) }}
                                                {{ __('m²') }}
                                            </div>
                                        </div>
                                    @endif


                                    <div class="d-flex my-1">
                                        <div class=" me-2">{{ __('Total Surface') }} : </div>
                                        <div class="fw-semi-bold">
                                            {{ number_format(floatval($superficie_du_TF_mere)) }}
                                            {{ __('m²') }}
                                        </div>
                                    </div>
                                    @if ($type_de_versement === 'tranche')
                                        <div class="d-flex border-top border-2 my-1 py-2">
                                            <div class=" me-2">{{ __('Montant Versee') }} : </div>
                                            <div class="fw-semi-bold">
                                                {{ number_format(floatval($montant_versee)) }}
                                                {{ __('XAF') }}
                                            </div>
                                        </div>
                                        <div class="d-flex my-1">
                                            <div class=" me-2">{{ __('Montant Restant') }} : </div>
                                            <div class="fw-semi-bold">
                                                {{ number_format(floatval($montant_restant)) }}
                                                {{ __('XAF') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="d-flex border-top border-2 my-1 py-2">
                                        <div class=" h5 me-2">{{ __('Total Amount') }}:</div>
                                        <div class="fw-semi-bold   h5"> {{ number_format(floatval($sale_amount)) }}
                                            {{ __('XAF') }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-4 mt-md-0">
                                <button type="submit" wire:click.prevent="update"
                                    class="btn btn-primary btn-sm btn-loading">

                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Sell') }}</span>
                                </button>
                            </div>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
