 <div>
     <x-alert-notif />
     <a href="#" class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#CreateAddCoordinatesModal" draggable="false" title="{{__('Add Coordinates')}}">
         <svg class="icon icon-sm text-info me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22" stroke-width="1.7" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
             <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
         </svg>
     </a>
     <div wire:ignore.self class="modal side-layout-modal fade" id="CreateAddCoordinatesModal" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:35%;">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="p-4 p-lg-4">
                         <div class="mb-4 mt-md-0">
                             <h1 class="mb-0 h4"> {{ __('Ajouter des coordonnées sur le tracé')}}</h1>
                             <p class="px-1"> {{ __('Ajouter des coordonnées sur le graphe donné')}} </p>
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
                                 <label for="geometre_id">{{ __('Geometre') }}</label>
                                 <x-input.select :options="$geometres->pluck('first_name','id')->toArray()" wire:model="geometre_id" prettyname="geometre_id" />
                                 @error('geometre_id')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                                 @enderror
                             </div>
                             <div class='form-group row mb-2'>
                                 <div class='col'>
                                     <label class="px-2" for="parcel_id">{{__('Préoccupation pour le lot')}}</label>
                                     <select wire:model="parcel_id" class='form-control'>
                                         <option value=''>{{__('-- Selectionner --')}}</option>
                                         @foreach($parcels as $parcel)
                                         <option value='{{$parcel->id}}'> {{__('Lot '). $parcel->numero_lot}}</option>
                                         @endforeach
                                     </select>
                                     @error('parcel_id')
                                     <div class="invalid-feedback">{{$message}}</div>
                                     @enderror
                                 </div>
                             </div>
                             <div class="form-group mb-2">
                                 <label for="numero_reference_plan">{{ __('Numero Reference du plan') }}</label>
                                 <input type="text" wire:model="numero_reference_plan" class="form-control  @error('numero_reference_plan') is-invalid @enderror " value="{{ old('numero_reference_plan') }}" placeholder="" id="numero_reference_plan" autofocus="" required="">
                                 @error('numero_reference_plan')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                                 @enderror
                             </div>
                             <div class='form-group row mb-2'>
                                 <div class='col'>
                                     <label class="px-2" for="plan">{{__('Ajouter les fichiers')}}</label>
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
                                 {{__('Ajouter coordonnée')}}
                             </button>
                             <div class="d-flex justify-content-end">
                                 <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                                 <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Creer')}}</button>
                             </div>
                         </x-form-items.form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>