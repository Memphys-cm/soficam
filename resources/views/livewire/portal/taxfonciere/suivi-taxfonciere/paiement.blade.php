
<div wire:ignore.self class="modal side-layout-modal fade" id="paiement" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:30%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Paiement de la Tax Foncier') }}</h1>
                        <p class="px-1"> {{ __('Payer une Tax Foncier') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="update">
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="payment_method">Moyen de paiement </label>
                                <select wire:model="payment_method" id="payment_method" class="form-select">
                                  
                                    <option value=""><strong>{{ __('--Selectionner--') }}</strong></option>
                                    <option value="OrangeMoney"><strong>{{ __('OrangeMoney') }}</strong></option>
                                    <option value="MobileMoney"><strong>{{ __('MobileMoney') }}</strong></option>
                                </select>
                                @error('payment_method')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                    
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="primary_phone_number">{{ __('Numero de transaction') }}</label>
                                <input wire:model="primary_phone_number" type="number"
                                    class="form-control  @error('primary_phone_number') is-invalid @enderror"
                                    placeholder="{{ __('67xxxxxxx') }}" required="">
                                @error('primary_phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="tax_amount">{{ __('Montant de la taxe') }}</label>
                                <input wire:model="tax_amount" type="number"
                                    class="form-control  @error('tax_amount') is-invalid @enderror"
                                     required="" disabled>
                                @error('tax_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div>
                        <button wire:click="confirmOrder" type="submit" class="btn btn-primary">pay</button>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="status_tax">{{ __('Statut_paiement Immobilier ') }}</label>
                                <select wire:model="status_tax" name="status_tax"
                                    class="form-select  @error('status_tax') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner --') }}</option>
                                    <option value="payer">{{ __('Payer') }}</option>
                                    <option value="non_payer">{{ __('Non Payer') }}</option>
                                </select>
                                @error('status_tax')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="update" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('update') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
