<div wire:ignore.self class="modal side-layout-modal fade" id="GeometreModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Déposition') }}{{ __(' de la quittance de l\'état de cession auprès du géomètre désigné') }}
                        </h1>
                        <p class="px-1">
                            {{__('Déposer') }}{{ __('  la quittance de l\'état de cession auprès du géomètre désigné') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="quitance_geometre">
                        <div class="form-group mb-3 row">
                            <div class='col-12 my-1' >
                                <label for="code">{{ __('Geometre') }}</label>
                                <x-input.select wire:model="geometre_id" prettyname="user_id" :options="$users->pluck('first_name', 'id')->toArray()" selected="('geometre_id')" />
                                @error('geometre_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="quitance_geometre"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Enregistrer')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
