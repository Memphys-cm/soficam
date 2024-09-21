<div wire:ignore.self class="modal side-layout-modal fade" id="paiement" tabindex="-1" aria-labelledby="modal-form"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:30%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Paiement de la Taxe Foncière') }}</h1>
                        <p class="px-1"> {{ __('Payer une Taxe Foncière') }}</p>
                    </div>
                    <x-form-items.form wire:submit="confirmOrder">
                        <div class='col'>
                            <label class="px-2" for="requestor_id">{{ __('Requérant') }}</label>
                            <x-input.select wire:model="requestor_id" prettyname="requestor" :options="$requestors->pluck('first_name', 'id')->toArray()" />
                            @error('user_ids')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="paymentType">Moyen de paiement </label>
                                <select wire:model="paymentType" id="paymentType" class="form-select">

                                    <option value=""><strong>{{ __('--Sélectionner--') }}</strong></option>
                                    <option value="Cash"><strong>{{ __('Cash') }}</strong></option>
                                    <option value="impot"><strong>{{ __('Impot') }}</strong></option>
                                </select>
                                @error('paymentType')
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
                        {{-- <button wire:click="confirmOrder" type="submit" class="btn btn-primary">pay</button> --}}
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="status_tax">{{ __('Statut de paiement ') }}</label>
                                <select wire:model="status_tax" name="status_tax"
                                    class="form-select  @error('status_tax') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                    <option value="payer">{{ __('Payé') }}</option>
                                    <option value="non_payer">{{ __('Non Payé') }}</option>
                                </select>
                                @error('status_tax')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if ($paymentType == 'impot')
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                    data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                                <a type="button" class="btn btn-primary btn-loading"
                                    href="{{ route('impot.certificat_pay', ['uuid'=>$titrefoncier->uuid]) }}">Payer</a>
                            </div>
                        @else
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                    data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                                <button type="submit" wire:click.prevent="confirmOrder"
                                    class="btn btn-primary btn-loading"
                                    wire:loading.attr="disabled">{{ __('Mettre à jour') }}</button>
                            </div>
                        @endif
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
