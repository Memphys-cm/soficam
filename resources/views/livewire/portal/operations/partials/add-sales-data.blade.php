<div>
    <x-alert-notif />
    <a title="{{__('Add Sales Details')}}" href="#" data-bs-toggle="modal" data-bs-target="#CreateAddSalesDataModal" draggable="false">
        <svg class="icon icon-sm text-primary me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>
    </a>
    <div wire:ignore.self class="modal side-layout-modal fade" id="CreateAddSalesDataModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-4 p-lg-4">
                        <div class="mb-4 mt-md-0">
                            <h1 class="mb-0 h4"> {{ __('Ajouter les données de vente de la parcelle')}}</h1>
                            <p class="px-1"> {{ __('Ajouter les données de vente au graphique donné')}} </p>
                        </div>
                        <x-form-items.form wire:submit="store">
                            <div class="form-group mb-2">
                                <label for="numero_reference_acte_expidition">{{ __('Reférence Acte Expidition') }}</label>
                                <input type="text" wire:model="numero_reference_acte_expidition" class="form-control  @error('numero_reference_acte_expidition') is-invalid @enderror " value="{{ old('numero_reference_acte_expidition') }}" placeholder="" id="numero_reference_acte_expidition" autofocus="" required="">
                                @error('numero_reference_acte_expidition')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="notaire_id">{{ __('Notaire') }}</label>
                                <x-input.select :options="$notaires->pluck('first_name','id')->toArray()" wire:model="notaire_id" prettyname="notaire_id" />
                                @error('notaire_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class='form-group row mb-2'>
                                <div class='col'>
                                    <label class="px-2" for="certificates_propriete_id">{{__('Ajouter des fichiers')}}</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="attachments" multiple>
                                    </div>
                                </div>
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
                                <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                                <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Créer')}}</button>
                            </div>
                        </x-form-items.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>