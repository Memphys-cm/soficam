<div wire:ignore.self class="modal side-layout-modal fade" id="CreateMorcellementNormaleModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Creer')}}{{__(' morcellement')}}</h1>
                        <p class="px-1"> {{ __('Creer')}}{{__(' un morcellement sur titre foncier')}} </p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class='form-group  mb-2'>
                            <label for="titre_foncier_id">{{ __('Numero du Titre Foncier') }}</label>
                            <x-input.land_title-select wire:model="titre_foncier_id" prettyname="titre_foncier" :options="$titre_fonciers" />
                            @error('titre_foncier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if(!empty($titre_foncier_users))
                        <span class="fw-bold py-2">{{__('Proprietaire du terrain')}}</span>
                        <div class='row'>
                            @foreach($titre_foncier_users->split($titre_foncier_users->count()/2) as $row )
                            <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
                                @foreach($row as $user)
                                <a href="#" class="d-flex align-items-center  py-1">
                                    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2"><span class="text-white">{{$user->initials}}</span></div>
                                    <div class="d-block">
                                        <span class="fw-bolder ">{{ucwords($user->name)}}</span>
                                        <div class="small text-gray">
                                            <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg> {{$user->primary_phone_number}}
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class='form-group row mb-2'>
                            <div class=" col"><label for="region">{{ __('Region') }}</label>
                                <input type="text" wire:model="region" class="form-control  @error('region') is-invalid @enderror " value="{{ old('region') }}" placeholder="" id="region" autofocus="" required="" disabled>
                                @error('region')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="division">{{ __('Division') }}</label>
                                <input type="text" wire:model="division" class="form-control  @error('division') is-invalid @enderror " value="{{ old('division') }}" placeholder="" id="division" autofocus="" required="" disabled>
                                @error('division')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-2'>
                            <div class=" col"><label for="sub_division">{{ __('Arrondissement') }}</label>
                                <input type="text" wire:model="sub_division" class="form-control  @error('sub_division') is-invalid @enderror " value="{{ old('sub_division') }}" placeholder="" id="sub_division" autofocus="" required="" disabled>
                                @error('sub_division')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="lieu_dit">{{ __('Village') }}</label>
                                <input type="text" wire:model="lieu_dit" class="form-control  @error('lieu_dit') is-invalid @enderror " value="{{ old('lieu_dit') }}" placeholder="" id="lieu_dit" autofocus="" required="" disabled>
                                @error('lieu_dit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class='form-group row mb-2'>
                            <div class='col'>
                                <label class="px-2" for="requestor_id">{{__('Requerant')}}</label>
                                <select wire:model="requestor_id" class='form-control'>
                                    <option value=''>{{__('-- Select --')}}</option>
                                    @foreach($users as $user)
                                    <option value='{{$user->id}}'>{{$user->first_name}} {{$user->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('requestor_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="certificates_propriete_id">{{__('Certificate proprietes')}}</label>
                                <select wire:model="certificates_propriete_id" class='form-control'>
                                    <option value=''>{{__('-- Selectionner --')}}</option>
                                    @foreach($certificates_proprietes as $certificates_propriete)
                                    <option value='{{$certificates_propriete->id}}'>{{$certificates_propriete->certificate_proprietes_number}}</option>
                                    @endforeach
                                </select>
                                @error('certificates_propriete_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-2'>
                            <div class='col'>
                                <label class="px-2" for="etat_cession_id">{{__('Etat Cession')}}</label>
                                <select wire:model="etat_cession_id" class='form-control'>
                                    <option value=''>{{__('-- Selectionner --')}}</option>
                                    @foreach($etat_cessions as $etat_cession)
                                    <option value='{{$etat_cession->id}}'>{{$etat_cession->reference_etat_cession}}</option>
                                    @endforeach
                                </select>
                                @error('etat_cession_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-2'>
                            <div class='col'>
                                <label class="px-2" for="certificates_propriete_id">{{__('Ajouter Fichier')}}</label>
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