<div wire:ignore.self>
    <a href="#" data-bs-toggle="modal" data-bs-target="#CreateAddCoordinatesModal" draggable="false" class="dropdown-item d-flex align-items-center">

        <svg class="dropdown-icon text-primary me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>
        {{__('Add Sales Details')}}
    </a>

    <div wire:ignore.self class="modal side-layout-modal fade" id="CreateAddCoordinatesModal" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-4 p-lg-5">
                        <div class="mb-4 mt-md-0">
                            <h1 class="mb-0 h4"> {{ __('Add Coordinates on Plot')}}</h1>
                            <p class="px-1"> {{ __('Add coordinates on the given plot')}} </p>
                        </div>
                        <x-form-items.form wire:submit="store">
                            <div class="form-group mb-2">
                                <label for="numero_ccp">{{ __('Numero CCP') }}</label>
                                <input type="text" wire:model="numero_ccp" class="form-control  @error('numero_ccp') is-invalid @enderror " value="{{ old('numero_ccp') }}" placeholder="" id="numero_ccp" autofocus="" required="">
                                @error('numero_ccp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="numero_ccp">{{ __('Geometre') }}</label>
                                <input type="text" wire:model="numero_ccp" class="form-control  @error('numero_ccp') is-invalid @enderror " value="{{ old('numero_ccp') }}" placeholder="" id="numero_ccp" autofocus="" required="">
                                @error('numero_ccp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class='form-group row mb-2'>
                                <div class='col'>
                                    <label class="px-2" for="parcel_id">{{__('Lot Concerner')}}</label>
                                    <select wire:model="parcel_id" class='form-control'>
                                        <option value=''>{{__('-- Select --')}}</option>
                                        @foreach($parcels as $parcel)
                                        <option value='{{$parcel->id}}'> {{__('Lot '). $parcel->numero_lot}}</option>
                                        @endforeach
                                    </select>
                                    @error('parcel_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
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
                                {{__('Add Coordinate')}}
                            </button>
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