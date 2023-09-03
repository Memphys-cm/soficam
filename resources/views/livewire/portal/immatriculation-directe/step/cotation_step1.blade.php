<div wire:ignore.self class="modal side-layout-modal fade" id="CotationImmaDirecteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Cotation') }}{{ __(' D\'un Dossier') }}
                        </h1>
                        <p class="px-1">
                            {{__('Coter') }}{{ __(' un Dossier D\'Immatriculation Directe au CSDAF') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="cotation_first_step">
                        <div class="form-group mb-3 row">
                            <div class='col-12 my-1'>
                                <label for="code">{{ __('Services') }}</label>
                                <x-input.select wire:model="service_id" prettyname="service_id" :options="$services->pluck('service_name_fr', 'id')->toArray()" selected="('service_id')" />
                                @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='col-12 my-1' >
                                <label for="code">{{ __('Utilisateur') }}</label>
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
                            <button type="submit" wire:click.prevent="cotation_first_step"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Coter')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
