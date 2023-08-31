<div wire:ignore.self class="modal side-layout-modal fade" id="EditChargeModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:30%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Modifier')}}{{__(' une charge sur un titre foncier')}}</h1>
                        <p class="px-1"> {{__('Titre Foncier')}} </p>
                    </div>
                    <x-form-items.form>
                        <div class='form-group  mb-2'>
                            <label for="titre_foncier_id">{{ __('Numero Titre Foncier') }}</label>
                            <input class="form-control" wire:model="titre_foncier_id" type="text">
                            @error('titre_foncier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(!empty($titre_foncier_users))
                        <span class="fw-bold py-2">{{__('Propriétaires fonciers')}}</span>
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
                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label for="type_charge">{{__('Type de charge')}}</label>
                                <select wire:model="type_charge" name="type_charge" class="form-select  @error('type_charge') is-invalid @enderror" required="">
                                    <option value="">{{__('Selectionner un Type de charge')}}</option>
                                    <option value="HYPOTHEQUE">{{__('HYPOTHEQUE')}}</option>
                                    <option value="DISPONIBLE">{{__('DISPONIBLE')}}</option>
                                    <option value="PRENOTE">{{__('PRENOTE')}}</option>
                                    <option value="SUSPENDU">{{__('SUSPENDU')}}</option>
                                </select>
                                @error('type_charge')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="update" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Mettre à jour')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>