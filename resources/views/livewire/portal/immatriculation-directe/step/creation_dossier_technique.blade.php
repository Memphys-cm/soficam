<div wire:ignore.self class="modal side-layout-modal fade" id="DossierTechniqueModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:40%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">
                            {{ __('Deposition') }}{{ __(' de la quittance de l\'état de cession auprès du géomètre désigné') }}
                        </h1>
                        <p class="px-1">
                            {{__('Deposer') }}{{ __('  la quittance de l\'état de cession auprès du géomètre désigné') }}
                        </p>
                    </div>
                    <x-form-items.form wire:submit="dossier_technique">
                        @foreach($coordinates as $coordinateIndex => $coordinate)
                        <div class='form-group mb-2 d-flex align-items-end justify-content-between'>
                            <div class=''>
                                <label for="coordonnees.{{$coordinateIndex}}">{{__('Coordonnees')}} - B{{ $loop->iteration }}</label>
                                <input wire:model="coordonnees.{{$coordinateIndex}}" type="text" step="0.0001" class="form-control col-md-12 @error('coordonnees') is-invalid @enderror" placeholder="{{__('45.XXXXX')}}" required="" value="" name="coordonnees">
                                @error('coordonnees')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <a type="button" wire:click="removeCoordinate({{ $coordinateIndex }})" class="btn-icon ">
                                <svg class="icon icon-sm text-danger me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                        @endforeach
                        <hr>
                        <button type="button" wire:click="addCoordinate" class="btn btn-sm btn-outline-primary">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            {{__('Ajouter Coordonnée')}}
                        </button>

                        <div class='form-group row mb-2'>
                            <div class='col-md-12'>
                                <label class="px-2" for="certificates_propriete_id">{{__('Ajouter fichier')}}</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" wire:model="attachments" multiple>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="dossier_technique"
                                class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{__('Enregistrer Le Dossier Technique')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
