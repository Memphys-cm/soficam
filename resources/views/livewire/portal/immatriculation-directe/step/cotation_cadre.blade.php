<div wire:ignore.self class="modal fade" id="CotationCadreModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:25%;">
        <div class="modal-content">
            <div class="modal-body p-0 py-2">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Cotation de la demande à un Cadre') }}
                        </h1>
                        <p class="px-1">
                            {{__('Coter la demande à un Cadre') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="cotation_cadre">
                        <div class="form-group mb-3 row">
                            <div class='col-12 my-1' >
                                <label for="code">{{ __('Cadre') }}</label>
                                <x-input.select wire:model="user_id" prettyname="user_id" :options="$users->pluck('first_name', 'id')->toArray()" selected="('user_id')" />
                                @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 my-1">
                                <label for="code">{{ __('Observation') }}</label>
                                <textarea wire:model="observation" class="form-control  @error('observation') is-invalid @enderror" name="" id="" cols="30" rows="10">
                                        </textarea>
                                @error('observation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="cotation_cadre"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Coter La Demande a un Cadre')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
