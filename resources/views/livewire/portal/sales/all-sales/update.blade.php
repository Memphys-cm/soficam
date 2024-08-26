<div wire:ignore.self class="modal side-layout-modal fade" id="updateAllSalesModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Mise à jour des ventes') }}</h1>
                        <p class="px-1"> {{ __('Mise à jour des ventes') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="update">
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="payment_method">{{ __('Mode de paiement') }}</label>
                                <select wire:model="payment_method"
                                    class="form-select @error('payment_method') is-invalid @enderror"
                                    id="payment_method" required="">
                                    {{-- <option value="">{{ __('-- select payment type --') }}</option> --}}
                                    <option value="cash">{{ __('Cash') }}</option>
                                    <option value="orange_money">{{ __('Orange Money') }}</option>
                                    <option value="mtn_mobile_money">{{ __('MTN Mobile Money') }}</option>
                                    <option value="cheque">{{ __('Chèque') }}</option>
                                    <option value="bank_transfer">{{ __('Transfert Bancaire') }}</option>


                                </select>
                                @error('payment_method')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="payment_status">{{ __('Statut Paiement Immobilier ') }}</label>
                                <select wire:model="payment_status" name="payment_status"
                                    class="form-select  @error('payment_status') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner --') }}</option>
                                    <option value="pending_payment">{{ __('paiement en_attente') }}</option>
                                    <option value="totally_paid">{{ __('totalement payé') }}</option>
                                </select>
                                @error('payment_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group mb-3 row'>
                            <div class=" col">
                                <label for="sales_type">{{ __('Type de vente') }}</label>
                                <input type="text" wire:model="sales_type"
                                    class="form-control  @error('sales_type') is-invalid @enderror "
                                    value="{{ old('sales_type') }}" placeholder="0" id="sales_type" autofocus=""
                                    required="" >
                                @error('sales_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" col">
                                <label for="sales_amount">{{ __('Montant de la vente') }}
                                    {{ __('XAF') }}</label>
                                <input type="number" wire:model="sales_amount"
                                    class="form-control  @error('sales_amount') is-invalid @enderror "
                                    value="{{ old('sales_amount') }}" placeholder="0" id="sales_amount" autofocus=""
                                    required="" disabled>
                                @error('sales_amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="update" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Mettre à jour') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
