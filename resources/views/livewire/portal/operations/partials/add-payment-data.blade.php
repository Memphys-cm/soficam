<div>
    <a title="{{__('Add Lorder Versement ')}}" data-bs-toggle="modal" data-bs-target="#CreateAddPaymentDataModal" draggable="false" href="#">
        <svg class="icon icon-sm text-primary me-2 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
        </svg>
    </a>
    <div wire:ignore.self class="modal side-layout-modal fade" id="CreateAddPaymentDataModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-4 p-lg-4">
                        <div class="mb-4 mt-md-0">
                            <h1 class="mb-0 h4"> {{ __('Ajouter des détails de paiement pour l\'opération')}}</h1>
                            <p class="px-1"> {{ __('Ajouter des détails de paiement pour l\'opération')}} </p>
                        </div>
                        <x-form-items.form wire:submit="store">
                            <div class="form-group mb-2">
                                <label for="prix">{{ __('Prix') }}</label>
                                <input type="text" wire:model="prix" class="form-control  @error('prix') is-invalid @enderror " value="" placeholder="" id="prix" autofocus="" required="">
                                @error('prix')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="operation_type_id">{{ __('Type Operation') }}</label>
                                <x-input.select wire:model="operation_type_id" prettyname="operation_type_id" :options="['mutation_totale_normale'=>'Mutation totale','mutation_totale_par_deces' => 'Mutation totale par deces','morcellement_normale' => 'Morcellement','morcellement_forcee'=>'Morcellement Forcee','retrait_indivision'=>'Retrait D\'indivision']" selected="({{$operation_type}})" />
                                @error('operation_type_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="code">{{ __('Commentaires') }}</label>
                                <textarea wire:model="commentaires" class="form-control  @error('commentaires') is-invalid @enderror" rows="4">
                                    </textarea>
                                @error('commentaires')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                                <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Create')}}</button>
                            </div>
                        </x-form-items.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>