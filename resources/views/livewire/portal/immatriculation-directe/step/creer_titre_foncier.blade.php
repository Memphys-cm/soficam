<div wire:ignore.self class="modal fade" id="CreerTitreFoncier" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:25%;">
        <div class="modal-content">
            <div class="modal-body p-0 py-2">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Creation Du Titre Foncier') }}
                        </h1>
                        <p class="px-1">
                            {{__('Creer Titre Foncier') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="create_tf">
                        <div class="form-group mb-3 row">
                            <div class="col-md-12">
                                <label for="volume">{{ __('Numero Duplicata') }}</label>
                                <input wire:model="duplicata" type="number"
                                    class="form-control  @error('duplicata') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required=""
                                    name="duplicata" >
                                @error('duplicata')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="volume">{{ __('Volume') }}</label>
                                <input wire:model="volume" type="number"
                                    class="form-control  @error('volume') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required=""
                                    name="volume" >
                                @error('volume')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="folio">{{ __('Folio') }}</label>
                                <input wire:model="folio" type="text"
                                    class="form-control  @error('folio') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required=""
                                    name="folio" >
                                @error('folio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="numero_cp">{{ __('Numero Cp') }}</label>
                                <input wire:model="numero_cp" type="text"
                                    class="form-control  @error('numero_cp') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required=""
                                    name="numero_cp" >
                                @error('numero_cp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="create_tf"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Generer le Titre Foncier')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
