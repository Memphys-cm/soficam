<div wire:ignore.self class="modal fade" id="bordoreauDeTransmitionModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:25%;">
        <div class="modal-content">
            <div class="modal-body p-0 py-2">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Modification') }}{{ __('Du Statut D\'un Dossier') }}
                        </h1>
                        <p class="px-1">
                            {{__('Modifier') }}{{ __(' le statut D\'un Dossier D\'Immatrculation') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="bordoreauDeTransmitionStatu">
                        <div class="form-group mb-3 row">
                            <div class="col-md-12">
                                <label for="numero_bordereau_transmission">{{ __('Numero Bordereau Transmission') }}</label>
                                <input wire:model="numero_bordereau_transmission" type="text"
                                    class="form-control  @error('numero_bordereau_transmission') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required=""
                                    name="numero_bordereau_transmission" >
                                @error('numero_bordereau_transmission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="bordoreauDeTransmitionStatu"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Modifier le Statut')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
