<div wire:ignore.self class="modal side-layout-modal fade" id="PayModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Effectuer')}}{{__(' un Paiement')}}</h1>
                        <p class="px-1"> {{__('Paiement')}} </p>
                    </div>
                    <x-form-items.form>
                        <fieldset class="border rounded">
                            <div class="form-group mt-4 px-4">
                                <div class="row mb-3">
                                    <label for="">Choisir le réseau mobile</label>
                                    <select class="form-control text-center" name="" id="">
                                        <option value="">--Selectionner--</option>
                                        <option style="background-color: orange" value="ORANGE MONEY"><b>ORANGE MONEY</b></option>
                                        <option style="background-color: yellow" value="MTN MOBILE MONEY"><b>MTN MOBILE MONEY</b></option>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <label for="">Numéro du payeur</label>
                                    <input class="form-control" name="" id="" type="text" placeholder="Entrer le numero">
                                </div>
                                <div class="row mb-3">
                                    <label for="">Montant</label>
                                    <input class="form-control" type="text" name="" id="" placeholder="Entrer le montant">
                                </div>
                            </div>
                        </fieldset>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" wire:click.prevent="" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Payer')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>