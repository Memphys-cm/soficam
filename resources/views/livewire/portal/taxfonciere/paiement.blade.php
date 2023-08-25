<div wire:ignore.self class="modal Fade" id="paiement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 700px">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1 text-center" id="paiement Label" style=" position: relative; left:6%">Paiements</h4>
                </div>

                <div class="p-4 pb-0">
                    <form class="text-center">
                        <div class="col" >
                            <label for="direction">Moyen de paiement </label>
                            <select wire:model="orderAsc" id="direction" class="form-select" style="width: 40vh; position: relative; left:35%">
                                <option value="asc"><strong>{{__('--Selectionner--')}}</strong></option>
                                <option value="asc"><strong>{{__('OrangeMoney')}}</strong></option>
                                <option value="desc"><strong>{{__('MobileMoney')}}</strong></option>
                            </select>
                        </div>
                        <br>
                        <div class='col' >
                            <label for="tax_amount">{{__('Montant de la taxe')}}</label>
                            <input style="width: 40vh; position: relative; left:35%" wire:model="tax_amount" type="number" class="form-control  @error('tax_amount') is-invalid @enderror" placeholder="Ex:700000" required="" value="" name="Montant de la taxe">
                            @error('Montant de la taxe')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="col" >
                            <label >{{__('Numero de transaction')}}</label>
                            <input style="width: 40vh; position: relative; left:35%" type="number" class="form-control  @error('Numero de transaction') is-invalid @enderror" placeholder="{{__('67xxxxxxx')}}" required="" name="name">
                            @error('Numero de transaction')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                       <br>
                       <button wire:click="paiement"  class="btn btn-primary">Payer</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>