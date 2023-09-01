<div wire:ignore.self class="modal side-layout-modal fade" id="updatePaySaleModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Details de la vente') }}</h1>
                        <p class="px-1"> {{ __('Mise à jour des ventes') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="payment">
                        @if (!empty($sale))
                            <div class='d-flex justify-content-between align-items-end'>
                                <div class=''>
                                    @if ($sale->user)
                                        <a href="#" class="d-flex align-items-center  py-1">
                                            <div
                                                class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                                <span class="text-white">{{ $sale->user->initials }}</span>
                                            </div>
                                            <div class="d-block">
                                                <span class="fw-bolder ">{{ ucwords($sale->user->name) }}</span>
                                                <div class="small text-gray">
                                                    <svg class="icon icon-xxs me-1 " fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                        </path>
                                                    </svg> {{ $sale->user->primary_phone_number }}
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class=''>
                                    <span
                                        class="fw-normal badge super-badge p-2 bg-{{ $sale->sale_type_style }} round">{{ $sale->sale_type_text }}</span>
                                </div>
                            </div>
                        @endif
                        @if (!empty($sale))
                            <hr>

                            @switch($sale->sales_type)
                                @case('etat_cession')
                                    @include('livewire.portal.sales.all-sales.partials.etat_cession_partial')
                                @break

                                @default
                            @endswitch

                            <hr>
                        @endif

                        @if ($sales_type === 'ordre_versement_imma_directe')

                            <div class='col'>
                                <label class="px-2" for="requestor_id">{{ __('Requérant') }}</label>
                                <x-input.select wire:model="requestor_id" prettyname="requestor" :options="$requestors->pluck('first_name', 'id')->toArray()" />
                                @error('user_ids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                       
                        @endif
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="payment_method">{{ __('MODE DE PAIEMENT') }}</label>
                                <select wire:model="payment_method"
                                    class="form-select @error('payment_method') is-invalid @enderror"
                                    id="payment_method" required="">
                                    <option value="">{{ __('--Selectionner--') }}</option>
                                    <option value="cash">{{ __('Cash') }}</option>
                                    <option value="orange_money">{{ __('Orange Money') }}</option>
                                    <option value="mtn_mobile_money">{{ __('MTN Mobile Money') }}</option>
                                </select>
                                @error('payment_method')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" col">
                                <label for="sales_amount">{{ __('Montant de la vente') }}
                                    {{ __('XAF') }}</label>
                                <input type="text" wire:model="sales_amount"
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
                        <div class="form-group mb-3">
                            <label for="payment_number">{{ __('Numero Paiement') }}</label>
                            @if(in_array($payment_method, ['mtn_mobile_money', 'orange_money']))
                                <input type="text" wire:model="payment_number" class="form-control @error('payment_number') is-invalid @enderror" value="{{ old('payment_number') }}" placeholder="0" id="payment_number" autofocus required>
                                @error('payment_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            @endif
                        </div>
                        

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="payment" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Payer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
