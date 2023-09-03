
<div wire:ignore.self class="modal fade" id="paiement" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:30%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Paiement de la Tax Foncier') }}</h1>
                        <p class="px-1"> {{ __('Payer une Tax Foncier') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="confirmOrder">
                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="paymentType">Moyen de paiement </label>
                                <select wire:model="paymentType" id="paymentType" class="form-select">
                                    <option value=""><strong>{{ __('--Selectionner--') }}</strong></option>
                                    <option value="ORANGE"><strong>{{ __('OrangeMoney') }}</strong></option>
                                    <option value="MTN"><strong>{{ __('MobileMoney') }}</strong></option>
                                </select>
                                @error('paymentType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="phone_number">{{ __('Numero de transaction') }}</label>
                                <input wire:model="phone_number" type="number"
                                    class="form-control  @error('phone_number') is-invalid @enderror"
                                    placeholder="{{ __('67xxxxxxx') }}" required="">
                                @error('phoneNumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div>
                        <div class='form-group mb-2 row'>
                            <div class="col">
                                <label for="taxFoncier_amount">{{ __('Montant de la taxe') }}</label>
                                <input wire:model="taxFoncier_amount" type="number"
                                    class="form-control  @error('taxFoncier_amount') is-invalid @enderror"
                                     required="" disabled>
                                @error('taxFoncier_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="confirmOrder" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('payer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
