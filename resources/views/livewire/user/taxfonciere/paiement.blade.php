
<div wire:ignore.self class="modal side-layout-modal fade" id="paiement" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:30%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Paiement de la Taxe Foncière') }}</h1>
                        <p class="px-1"> {{ __('Payer une Taxe Foncière') }} </p>
                    </div>
                    <x-form-items.form wire:submit="confirmOrder">
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="paymentType">Moyen de paiement </label>
                                <select wire:model="paymentType" id="paymentType" class="form-select">
                                  
                                    <option value=""><strong>{{ __('--Sélectionner--') }}</strong></option>
                                    <option value="ORANGE"><strong>{{ __('Orange Money') }}</strong></option>
                                    <option value="MTN"><strong>{{ __('MTN Mobile Money') }}</strong></option>
                                </select>
                                @error('paymentType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                    
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="phoneNumber">{{ __('Numéro de transaction') }}</label>
                                <input wire:model="phoneNumber" type="number"
                                    class="form-control  @error('phoneNumber') is-invalid @enderror"
                                    placeholder="{{ __('67xxxxxxx') }}" required="">
                                @error('phoneNumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="taxFoncier_amount">{{ __('Montant de la Taxe') }}</label>
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
                                wire:loading.attr="disabled">{{ __('Payer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
