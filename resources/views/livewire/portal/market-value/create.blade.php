<div wire:ignore.self class="modal side-layout-modal fade" id="CreatelandModal" tabindex="-1" aria-labelledby="modal-form"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Créer') }} {{ __('La valeur Venale') }}</h1>
                        <p class="px-1"> {{ __('Valeur Venale') }} </p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label for="villageName">{{ __('Village') }}</label>
                                <input wire:model="villageName" type="text"
                                    class="form-control  @error('villageName') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required="">
                                @error('villageName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="market_value">{{ __('Valeur') }}</label>
                                <input wire:model="marketValue" type="number"
                                    class="form-control  @error('marketValue') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required="">
                                @error('marketValue')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="subdivision">{{ __('Arrondissement') }}</label>
                                <x-input.select wire:model="sub_division_id" prettyname="subdivision"
                               :options="$subdivisions->pluck('sub_division_name_en', 'id')->toArray()" selected="('sub_division_id')" />
                               
                                @error('sub_division_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Créer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
