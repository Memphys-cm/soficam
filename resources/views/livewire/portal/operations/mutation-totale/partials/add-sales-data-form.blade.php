<div wire:ignore.self class="modal side-layout-modal fade" id="CreateAddSalesDataModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Add Sales Data of Plot')}}</h1>
                        <p class="px-1"> {{ __('Add sales Data od the given plot')}} </p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class="form-group mb-2">
                            <label for="numero_reference_acte_expidition">{{ __('Reference Acte Expidition') }}</label>
                            <input type="text" wire:model="numero_reference_acte_expidition" class="form-control  @error('numero_reference_acte_expidition') is-invalid @enderror " value="{{ old('numero_reference_acte_expidition') }}" placeholder="" id="numero_reference_acte_expidition" autofocus="" required="">
                            @error('numero_reference_acte_expidition')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="notaire_id">{{ __('Notaire') }}</label>
                            <input type="text" wire:model="notaire_id" class="form-control  @error('notaire_id') is-invalid @enderror " value="{{ old('notaire_id') }}" placeholder="" id="notaire_id" autofocus="" required="">
                            @error('notaire_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class='form-group row mb-2'>
                            <div class='col'>
                                <label class="px-2" for="certificates_propriete_id">{{__('Add Files')}}</label>
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
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Create')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>