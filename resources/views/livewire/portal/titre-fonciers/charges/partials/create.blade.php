<div wire:ignore.self class="modal side-layout-modal fade" id="CreateChargeModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Add')}}{{__(' a new Charge on a Land Title')}}</h1>
                        <p class="px-1"> {{__('Land Title')}} </p>
                    </div>
                    <x-form-items.form wire:submit="">
                        <div class='form-group mb-3 row'>
                            <div class=" col">
                                <label for="numero_titre_foncier">{{ __('Land Title Number') }}</label>
                                <input wire:model="numero_titre_foncier" class="form-control" name="numero_titre_foncier" id="numero_titre_foncier" type="text" disabled>
                                @error('numero_titre_foncier')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                              
                            <div class="col">
                                <label for="etat_TF">{{__('Type of Charge')}}</label>
                                <select wire:model="etat_TF" name="etat_TF" class="form-select  @error('etat_TF') is-invalid @enderror" required="">
                                    <option value="">{{__('Select Type of Charge')}}</option>
                                    <option value="HYPOTHEQUE">{{__('HYPOTHEQUE')}}</option>
                                    <option value="DISPONIBLE">{{__('DISPONIBLE')}}</option>
                                    <option value="PRENOTE">{{__('PRENOTE')}}</option>
                                    <option value="SUSPENDU">{{__('SUSPENDU')}}</option>
                                </select>
                                @error('etat_TF')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>                            
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label for="price">{{ __('Price') }}</label>
                                <input wire:model="price" class="form-control" name="price" id="price" type="text" disabled>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">

                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('create')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>