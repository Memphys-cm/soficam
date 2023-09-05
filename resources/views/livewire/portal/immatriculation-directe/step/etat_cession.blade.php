<div wire:ignore.self class="modal side-layout-modal fade" id="EtatCessionModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ __('Etat Cession') }}</h1>
                        <p class="px-1"> {{ __(' Etat Cession') }} &#128522;
                        </p>
                    </div>
                    <x-form-items.form wire:submit.prevent="etatDeCession">

                        <div class='row form-group mb-3'>
                       <div class="col-md-6 py-2">
                                <label for="code">{{ __('Zone') }}</label>
                                <select wire:model="zone" name="zone"
                                    class="form-select  @error('zone') is-invalid @enderror">
                                    <option value="">{{ __('--Sélectionner la Zone --') }}</option>
                                    <option value="urbain">{{ __('terrain_urbain') }} </option>
                                    <option value="rurale">{{ __('terrain_rurale') }} </option>
                                </select>
                                @error('zone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                          
                            <div class="col-md-6 py-2">
                                <label for="code">{{ __('superficie en m²') }}</label>
                                <input wire:model="superficie_en_m2" type="number"
                                    class="form-control  @error('superficie_en_m2') is-invalid @enderror"
                                    placeholder="" required="" value=""
                                    name="superficie_en_m2">
                                @error('superficie_en_m2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 py-2">
                                <label for="code">{{ __('Coût') }}</label>
                                <input wire:model="cout" type="number"
                                    class="form-control  @error('cout') is-invalid @enderror"
                                    placeholder="" required="" value="" name="cout">
                                @error('cout')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 py-2">
                                <label for="code">{{ __('Frais Supplémentaires') }}</label>
                                <input wire:model="frais_suplementaires" type="number"
                                    class="form-control  @error('frais_suplementaires') is-invalid @enderror"
                                    placeholder="" required="" value=""
                                    name="frais_suplementaires">
                                @error('frais_suplementaires')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 py-2">
                                <label for="code">{{ __('Coût état cession') }}</label>
                                <input wire:model="cout_etat_cession" type="number"
                                    class="form-control  @error('cout_etat_cession') is-invalid @enderror"
                                    placeholder="" required="" value=""
                                    name="cout_etat_cession">
                                @error('cout_etat_cession')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 py-2">
                                <label for="code">{{ __('Commentaires') }}</label>
                                <textarea wire:model="commentaires"
                                    class="form-control  @error('commentaires') is-invalid @enderror" name="" id=""
                                    cols="30" rows="10">
                                    </textarea>
                                @error('commentaires')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end py-2">
                            <button type="button" wire:click.prevent="clearFields"
                                class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ ('Créer') }} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
