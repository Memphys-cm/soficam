<div wire:ignore.self class="modal fade" id="PayModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:30%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Effectuer')}}{{__(' un Paiement')}}</h1>
                        <p class="px-1"> {{__('Paiement')}} </p>
                    </div>
                    <x-form-items.form wire:submit="confirmPayment">
                        <div class="form-group mt-3 px-2">
                            <div class="row mb-2">
                                <label for="">{{__('Choisir le réseau mobile')}}</label>
                                <select wire:model="payment_method" class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" required="">
                                    <option value="">{{ __('--Selectionner--') }}</option>
                                    <option value="orange_money">{{ __('Orange Money') }}</option>
                                    <option value="mtn_mobile_money">{{ __('MTN Mobile Money') }}</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <label for="">{{__('Numéro du payeur')}}</label>
                                <input class="form-control" wire:model="phone_number" id="" type="text" placeholder="Entrer le numero">
                            </div>
                            <div class="row mb-2">
                                <label for="">{{__('Montant')}}</label>
                                <input class="form-control" type="text" wire:model="amount" placeholder="Entrer le montant" disabled>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="confirmPayment" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Payer')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>