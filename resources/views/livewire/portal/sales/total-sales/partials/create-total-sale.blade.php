<div wire:ignore.self class="modal side-layout-modal fade" id="CreateMutationTotalModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-widdiv:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Total des ventes de terrains') }}</h1>
                        <p class="px-1"> {{ __('Vente d\'une terre entière') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <div class='form-group row mb-2'>
                            <div class=" col"><label for="titre_foncier_id">{{ __('Numéro du titre foncier') }}</label>
                                <x-input.select wire:model="titre_foncier_id" prettyname="titre_foncier" :options="$titre_fonciers->pluck('numero_titre_foncier', 'id')->toArray()"  />
                                @error('titre_foncier_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 ">
                                <label for="code">{{ __('Notaire') }}</label>
                                <select wire:model="notaire_id" class="form-control @error('notaire_id') is-invalid @enderror">
                                    <option value=''>{{__('-- Selectionner --')}}</option>
                                    @foreach($notaires as $notaire)
                                    <option wire:key="{{ $notaire->id }}" value='{{$notaire->id}}'> {{!empty($notaire->cabinet) ? $notaire->cabinet->nom_cabinet : '' }} - {{ucfirst($notaire->first_name)}} {{ucfirst($notaire->last_name)}} </option>
                                    @endforeach
                                </select>
                                @error('notaire_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-2'>
                            <div class=" col"><label for="region">{{ __('Region') }}</label>
                                <input type="text" wire:model="region" class="form-control  @error('region') is-invalid @enderror " value="{{ old('region') }}" placeholder="" id="region" autofocus="" required="" disabled>
                                @error('region')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="division">{{ __('Sous Region') }}</label>
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
                        <div class='form-group row mb-2'>
                            <div class='col'>
                                <label class="px-2" for="user_ids">{{__('Proprietaire')}}</label>
                                <x-input.selectmultipleusers wire:model="user_ids" prettyname="user_ids" :options="$users" selected="('user_ids')"  multiple="multiple"/>
                                @error('user_ids')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="type_de_versement">{{ __('TYPE DE PAIEMENT*') }}</label>
                                <select wire:model="type_de_versement"
                                    class="form-select @error('type_de_versement') is-invalid @enderror"
                                    id="type_de_versement" required="">
                                    
                                    <option value="cash" @if (old('type_de_versement') === 'cash') selected @endif>Cash
                                    </option>
                                    <option value="tranche" @if (old('type_de_versement') === 'tranche') selected @endif>
                                        Tranche</option>

                                </select>
                                @error('type_de_versement')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" col">
                                <label for="price_per_m²">{{ __('Prix(m²)*') }}</label>
                                <input type="number" wire:model="price_per_m²" class="form-control  @error('price_per_m²') is-invalid @enderror " value="{{ old('price_per_m²') }}" placeholder="0" id="price_per_m²" autofocus="" required="">
                                @error('price_per_m²')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row mb-3'>
                            <div class=" col">
                                <label for="superficie_du_TF_mere">{{ __('ZONE VENDUE') }}</label>
                                <input type="number" wire:model="superficie_du_TF_mere" class="form-control  @error('superficie_du_TF_mere') is-invalid @enderror " value="{{ old('superficie_du_TF_mere') }}" placeholder="0" id="superficie_du_TF_mere" autofocus="" required="" disabled>
                                @error('superficie_du_TF_mere')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class=" col"><label for="sale_amount">{{ __('Montant de la vente') }}
                                    {{ __('XAF') }}</label>
                                <input type="number" wire:model="sale_amount" class="form-control  @error('sale_amount') is-invalid @enderror " value="{{ old('sale_amount') }}" placeholder="0" id="sale_amount" autofocus="" required="" disabled>
                                @error('sale_amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @if ($type_de_versement === 'tranche')
                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="montant_versee">{{ __('Montant Versee(XAF)') }}</label>
                                <input type="number" wire:model="montant_versee"
                                    class="form-control @error('montant_versee') is-invalid @enderror"
                                    value="{{ old('montant_versee') }}" placeholder="0" id="montant_versee"
                                    autofocus="" required="">
                                @error('montant_versee')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="montant_restant">{{ __('Montant Restant(XAF)') }}</label>
                                <input type="text"class="form-control" id="montant_restant"
                                    name="montant_restant" value="{{ $montant_restant ?? 0 }}" readonly>
                                @error('montant_restant')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="commentaires">{{ __('Commentaires') }}</label>
                                <textarea rows="3" wire:model="commentaires" class="form-control @error('commentaires') is-invalid @enderror" placeholder="Edea" id="commentaires" autofocus="" required="">{{ old('commentaires') }}</textarea>
                                @error('commentaires')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="col-auto">
                                <div class="text-end">
                                    <div class="d-flex my-1">
                                        <div class="me-2">{{ __('Prx(m²)') }} :</div>
                                        <div class="fw-semi-bold"> {{ number_format(floatval($price_per_m²)) }}
                                            {{ __('XAF') }}
                                        </div>
                                    </div>
                                    <div class="d-flex my-1">
                                        <div class=" me-2">{{ __('SURFACE À VENDRE') }} : </div>
                                        <div class="fw-semi-bold">{{ number_format(floatval($superficie_du_TF_mere)) }}
                                            {{ __('m²') }}
                                        </div>
                                    </div>

                                    @if ($type_de_versement === 'tranche')
                                    <div class="d-flex border-top border-2 my-1 py-2">
                                        <div class=" me-2">{{ __('Montant Versee') }} : </div>
                                        <div class="fw-semi-bold">
                                            {{ number_format(floatval($montant_versee)) }}
                                            {{ __('XAF') }}
                                        </div>
                                    </div>
                                    <div class="d-flex my-1">
                                        <div class=" me-2">{{ __('Montant Restant') }} : </div>
                                        <div class="fw-semi-bold">
                                            {{ number_format(floatval($montant_restant)) }}
                                            {{ __('XAF') }}
                                        </div>
                                    </div>
                                @endif
                                    <div class="d-flex border-top border-2 my-1 py-2">
                                        <div class=" h5 me-2">{{ __('Montant total') }}:</div>
                                        <div class="fw-semi-bold   h5"> {{ number_format(floatval($sale_amount)) }}
                                            {{ __('XAF') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 mt-md-0">
                                <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-sm btn-loading">
                                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Enregistrement') }}</span>
                                </button>
                            </div>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>