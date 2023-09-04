<div wire:ignore.self class="modal fade" id="ConvocationImmaDirecteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:25%;">
        <div class="modal-content">
            <div class="modal-body p-0 py-2">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Impression Du Message Porte') }}
                        </h1>
                        <p class="px-1">
                            {{ __('Imprimer Le Message POrter') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="convocation">
                        <div class="form-group mb-3 row">
                            <div class='col-md-12 my-1'>
                                <label for="code">{{ __('Date Message Porte') }}</label>
                                <input wire:model="date_convocation" type="date"
                                    class="form-control  @error('date_convocation') is-invalid @enderror"
                                    placeholder="15000" required="" value="" name="date_debut">
                                @error('date_convocation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="convocation"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Imprimer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
