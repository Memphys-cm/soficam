<div wire:ignore.self class="modal side-layout-modal fade" id="CreateChargeModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{__('Create')}}{{__('a new on a Land Title')}}</h1>
                        <p class="px-1"> {{__('Land Title')}} </p>
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
                                <label for="">{{__('Certificate Proprietes Number')}}</label>
                                <input wire:model="" type="text" class="form-control  @error('') is-invalid @enderror" placeholder="{{__('1986')}}" required="">
                                @error('')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mb-3 row">
                            <div class='col'>
                                <label class="px-2" for="">{{__('Requestor')}}</label>
                                <x-input.select wire:model="" prettyname="requestor" :options="$requestors->pluck( 'first_name','id')->toArray()" />
                                @error('user_ids')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="">{{__('Certificate Proprietes Type')}}</label>
                                <select wire:model="" name="" class="form-select  @error('') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Select --')}}</option>
                                    <option value="">{{__('Personne Physique')}}</option>
                                    <option value="">{{__('Personne Morale')}}</option>
                                </select>
                                @error('')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="">{{__('Price')}}</label>
                                <input wire:model="" type="number" class="form-control  @error('') is-invalid @enderror" placeholder="{{__('')}}" required="">
                                @error('')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="">{{__('Status of CP')}}</label>
                                <select wire:model="" name="" class="form-select  @error('') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Select --')}}</option>
                                    <option value="expired">{{__('expired')}}</option>
                                    <option value="active">{{__('active')}}</option>
                                </select>
                                @error('')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="">{{ __('Certificate Propriete Reason') }}</label>
                                <textarea rows="6" wire:model="" class="form-control @error('') is-invalid @enderror" id="" autofocus="" required=""></textarea>
                                @error('')
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