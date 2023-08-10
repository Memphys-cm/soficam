<div wire:ignore.self class="modal side-layout-modal fade" id="CreatecertificateproprieteModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('create')}}{{__(' a Certificate Propriety')}}</h1>
                        <p class="px-1"> {{__(' a Certificate Propriety')}} </p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class='form-group mb-3 row'>
                            <div class=" col"><label for="titre_foncier_id">{{ __('Land Title Number') }}</label>
                                <x-input.select wire:model="titre_foncier_id" prettyname="titre_foncier" :options="$titre_fonciers->pluck('numero_titre_foncier', 'id')->toArray()" selected="('titre_foncier_id')" />
                                @error('titre_foncier_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="certificate_proprietes_number">{{__('Certificate Proprietes Number')}}</label>
                                <input wire:model="certificate_proprietes_number" type="text" class="form-control  @error('certificate_proprietes_number') is-invalid @enderror" placeholder="{{__('1986')}}" required="">
                                @error('certificate_proprietes_number')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mb-3 row">
                            <div class='col'>
                                <label class="px-2" for="requestor_id">{{__('Requestor')}}</label>
                                <x-input.select wire:model="requestor_id" prettyname="requestor" :options="$requestors->pluck( 'first_name','id')->toArray()" />
                                @error('user_ids')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="certificate_proprietes_type">{{__('Certificate Proprietes Type')}}</label>
                                <select wire:model="certificate_proprietes_type" name="certificate_proprietes_type" class="form-select  @error('certificate_proprietes_type') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Select --')}}</option>
                                    <option value="personne_physique">{{__('Personne Physique')}}</option>
                                    <option value="personne_morale">{{__('Personne Morale')}}</option>
                                </select>
                                @error('certificate_proprietes_type')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="price">{{__('Price')}}</label>
                                <input wire:model="price" type="number" class="form-control  @error('price') is-invalid @enderror" placeholder="{{__('')}}" required="">
                                @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="status">{{__('Status of CP')}}</label>
                                <select wire:model="status" name="status" class="form-select  @error('status') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Select --')}}</option>
                                    <option value="expired">{{__('expired')}}</option>
                                    <option value="active">{{__('active')}}</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="certificate_propriete_reason">{{ __('Certificate Propriete Reason') }}</label>
                                <textarea rows="6" wire:model="certificate_propriete_reason" class="form-control @error('certificate_propriete_reason') is-invalid @enderror" id="certificate_propriete_reason" autofocus="" required=""></textarea>
                                @error('certificate_propriete_reason')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('create')}}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>