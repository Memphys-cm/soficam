<div>
    <x-alert />
    @if ($errors->any())
    <div class="alert alert-danger alert-fixed border-danger-dash alert-important alert-dimissable ">
        <div class='d-flex justify-content-between align-items-start'>

            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li class="px-n4">{{ $error }}</li>
                @endforeach
            </ul>


            <div class='d-flex justify-content-end align-items-start'>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
    <x-delete-modal />
    <x-form-items.form wire:submit="store">
        <div class='p-0'>
            <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
                <div class="mb-lg-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item">
                                <a href="#">
                                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="/">{{__('Tableau de bord')}}</a></li>
                            <li class="breadcrumb-item "><a href="{{route('portal.lotissements.index')}}">{{__('Lotissements')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Créer')}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between my-3">

                    <a type="submit" wire:click.prevent="store" class="btn btn-primary ms-auto mx-3" wire:loading.attr="disabled">{{ __('Enregistrer') }} </a>
                    <a href="{{route('portal.lotissements.index')}}" class="btn btn-gray-200 text-gray-600 ">{{ __('Fermer') }}</a>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-3'>
                <div class="card p-3">
                    <h5 class="w-auto">{{__('Créer Lotissement')}}</h5>
                    <ul>
                        <li>{{__('Enregistrer les informations foncières')}}</li>
                        <li>{{__('Enregistrer les informations relatives au promoteur')}}</li>
                        <li>{{__('Ajouter des blocs')}}</li>
                        <li>{{__('Ajouter des informations sur les parcelles (lots) ')}}</li>
                    </ul>
                </div>
            </div>
            <div class='col-md-9'>
                <div class="card p-4 mb-3">
                    <legend class="w-auto">{{__('Informations sur le terrain')}}</legend>
                    <div class='row form-group mb-3'>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Numéro du Titre Foncier') }}</label>
                            <x-input.land_title-select wire:model="titre_foncier_id" prettyname="titre_foncier_id" :options="$titre_fonciers" selected="('titre_foncier_id')" />
                            @error('titre_foncier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="">{{ __('Surface totale du Titre Foncier') }}</label>
                            <input type="text" class="form-control" required="" value="{{$tf_total_surface_area}}" disabled>

                        </div>
                        <div class="col-md-6 py-2">
                            <label for="">{{ __('Surface vendue Titre Foncier') }}</label>
                            <input type="text" class="form-control" required="" value="{{$tf_total_surface_area_sold}}" disabled>

                        </div>
                        <div class="col-md-6 py-2">
                            <label for="">{{ __('Surface restante du Titre Foncier') }}</label>
                            <input type="text" class="form-control" required="" value="{{$tf_total_surface_area_remaining}}" disabled>
                        </div>
                    </div>
                    <legend class="w-auto">{{__('Informations sur le promoteur')}}</legend>
                    <div class='row form-group mb-3'>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Maeture') }}</label>
                            <input wire:model="maeture" type="text" class="form-control  @error('maeture') is-invalid @enderror" placeholder="maeture" required="" value="" name="maeture">
                            @error('maeture')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Promoteur Réel') }}</label>
                            <input wire:model="promo_imo" type="text" class="form-control  @error('promo_imo') is-invalid @enderror" placeholder="..." required="" value="" name="promo_imo">
                            @error('promo_imo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Agent immobilier') }}</label>
                            <input wire:model="agent_imo" type="text" class="form-control  @error('agent_imo') is-invalid @enderror" placeholder="..." required="" value="" name="agent_imo">
                            @error('agent_imo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Lotisseur') }}</label>
                            <input wire:model="lotisseur" type="text" class="form-control  @error('lotisseur') is-invalid @enderror" placeholder="{{ __('lotisseur') }}" required="" value="" name="lotisseur">
                            @error('lotisseur')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Cabinet Géomètre') }}</label>
                            <select wire:model="cabinet_geometre_id" class="form-control @error('cabinet_geometre_id') is-invalid @enderror">
                                <option value=''>{{__('-- Sélectionner --')}}</option>
                                @foreach($cabinet_geometres as $lgeo)
                                <option wire:key="{{ $lgeo->id }}" value='{{$lgeo->id}}'>{{ucfirst($lgeo->nom_cabinet)}} </option>
                                @endforeach
                            </select>
                            @error('cabinet_geometre_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Géomètre') }}</label>
                            <select wire:model="geometre_id" class="form-control @error('geometre_id') is-invalid @enderror">
                                <option value=''>{{__('-- Sélectionner --')}}</option>
                                @foreach($geometres as $geo)
                                <option wire:key="{{ $geo->id }}" value='{{$geo->id}}'>{{ucfirst($geo->first_name)}} {{ucfirst($geo->last_name)}} </option>
                                @endforeach
                            </select>
                            @error('geometre_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Urbaniste') }}</label>
                            <input wire:model="urbaniste" type="text" class="form-control  @error('urbaniste') is-invalid @enderror" placeholder="{{ __('urbaniste') }}" required="" value="" name="urbaniste">
                            @error('urbaniste')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="code">{{ __('Contrôleur') }}</label>
                            <input wire:model="controlleur" type="text" class="form-control  @error('controlleur') is-invalid @enderror" placeholder="{{ __('controleur') }}" required="" value="" name="controlleur">
                            @error('controlleur')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card p-4 ">
                    <div class='mb-2'>
                        <button type="button" wire:click="addBlock" class="btn btn-primary">{{__('Ajouter un bloc')}}</button>
                    </div>
                    @foreach($blocks as $blockIndex => $block)
                    <fieldset class="border p-3 mb-3 rounded">
                        <div class='d-flex justify-content-between align-items-end'>
                            <div class="form-group ">
                                <div class=''>
                                    <label for="blockName">{{__('Bloc')}} {{$blockIndex+1 }} {{__('Nom')}}</label>
                                    <input type="text" class="form-control px-4  @error('blocks.{{ $blockIndex }}.block_name') is-invalid @enderror" wire:model="blocks.{{ $blockIndex }}.block_name"  placeholder="{{'Bloc No. '.$blockIndex+1}}">
                                    @error('blocks.$blockIndex.block_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <button type="button" wire:click="addLot({{ $blockIndex }})" class="btn btn-sm btn-primary">
                                    <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    {{__('Lot')}}
                                </button>
                                <button type="button" wire:click="addLotPublic({{ $blockIndex }})" class="btn btn-sm btn-primary">
                                    <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>{{__('Lot Public')}}
                                </button>
                                <button type="button" wire:click="removeBlock({{ $blockIndex }})" class="btn btn-sm btn-danger">
                                    <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>

                                    {{__('Bloc')}}
                                </button>
                            </div>
                        </div>
                        <hr>
                        @foreach($block['parcels'] as $lotIndex => $lot)
                        @if ($lot['type'] != 'public')
                        <div class="row form-group mt-3 mb-2">
                            <div class="col-md-3">
                                <label for="numero_du_lot">{{__('Numéro du Lot')}}</label>
                                <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.numero_du_lot">
                            </div>
                            <div class="col-md-3">
                                <label for="surperficie_du_lot">{{__('Superficie du Lot')}}</label>
                                <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.surperficie_du_lot">
                            </div>
                            <div class="col-md-3">
                                <label for="statut_du_lot">{{__('Statut du Lot')}}</label>
                                <select wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.statut_du_lot" class="form-select  @error('statut_du_lot') is-invalid @enderror" required="">
                                    <option value="">{{__('--Sélectionner--')}}</option>
                                    <option value="batit">{{__('Construit')}}</option>
                                    <option value="non_batit">{{__('Non construit')}}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="date_lotissement">{{__('Date')}}</label>
                                <input type="date" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.date_lotissement">
                            </div>
                        </div>
                        <div class="row form-group mt-3 mb-2">
                            <!-- {{--
                            <div class="col-md-3 ">
                                <label for="code">{{ __('Cabinet Notaire') }}</label>
                                <select wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.cabinet_notaire_id" class="form-control @error('cabinet_notaire_id') is-invalid @enderror">
                                    <option value=''>{{__('-- Select --')}}</option>
                                    @foreach($cabinet_notaires as $cabinet_notaire)
                                    <option wire:key="{{ $cabinet_notaire->id }}" value='{{$cabinet_notaire->id}}'>{{ucfirst($cabinet_notaire->nom_cabinet)}} </option>
                                    @endforeach
                                </select>
                                @error('cabinet_notaire_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            --}} -->
                            <div class="col-md-6 ">
                                <label for="code">{{ __('Notaire') }}</label>
                                <select wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.notaire_id" class="form-control @error('notaire_id') is-invalid @enderror">
                                    <option value=''>{{__('-- Sélectionner --')}}</option>
                                    @foreach($notaires as $notaire)
                                    <option wire:key="{{ $notaire->id }}" value='{{$notaire->id}}'> {{!empty($notaire->cabinet) ? $notaire->cabinet->nom_cabinet : '' }} - {{ucfirst($notaire->first_name)}} {{ucfirst($notaire->last_name)}} </option>
                                    @endforeach
                                </select>
                                @error('notaire_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- {{--
                            <div class="col-md-3 ">
                                    <label for="cabinet_lot_geometre_id">{{ __('Cabinet Geometre') }}</label>
                                    <select wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.cabinet_lot_geometre_id" class="form-control @error('cabinet_lot_geometre_id') is-invalid @enderror">
                                        <option value=''>{{__('-- Select --')}}</option>
                                        @foreach($cabinet_lot_geometres as $cabinet_lot_geo)
                                        <option wire:key="{{ $cabinet_lot_geo->id }}" value='{{$cabinet_lot_geo->id}}'>{{ucfirst($cabinet_lot_geo->nom_cabinet)}} </option>
                                        @endforeach
                                    </select>
                                    @error('cabinet_lot_geometre_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            --}} -->
                            <div class="col-md-6 ">
                                <label for="lot_geometre_id">{{ __('Géomètre') }}</label>
                                <select wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.lot_geometre_id" class="form-control @error('lot_geometre_id') is-invalid @enderror">
                                    <option value=''>{{__('-- Sélectionner --')}}</option>
                                    @foreach($lot_geometres as $lot_geo)
                                    <option wire:key="{{ $lot_geo->id }}" value='{{$lot_geo->id}}'> {{!empty($lot_geo->cabinet) ? $lot_geo->cabinet->nom_cabinet : '' }} - {{ucfirst($lot_geo->first_name)}} {{ucfirst($lot_geo->last_name)}} </option>
                                    @endforeach
                                </select>
                                @error('lot_geometre_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @else
                        <div class="row form-group mt-3 mb-2">
                            <div class="col-md-3">
                                <label for="numero_du_lot">{{__('Numéro du Lot')}}</label>
                                <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.numero_du_lot">
                            </div>
                            <div class="col-md-3">
                                <label for="surperficie_du_lot">{{__('Superficie du Lot')}}</label>
                                <input type="number" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.surperficie_du_lot">
                            </div>
                            <div class="col-md-3">
                                <label for="lotEtat">{{__('L\'affectation du Lot')}}</label>
                                <input type="text" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.laffectation_du_lot">
                            </div>
                            <div class="col-md-3">
                                <label for="date_lotissement">{{__('Date')}}</label>
                                <input type="date" class="form-control" wire:model="blocks.{{ $blockIndex }}.parcels.{{ $lotIndex }}.date_lotissement">
                            </div>
                        </div>
                        @endif
                        <div class='d-flex justify-content-end'>
                            <button type="button" wire:click="removeLot({{ $blockIndex }}, {{ $lotIndex }})" class="btn btn-sm btn-icon btn-danger">
                                <svg class="icon icon-sm text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        @if(!$loop->last)
                        <hr> @endif
                        @endforeach
                    </fieldset>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-between my-3">
                <a type="submit" wire:click.prevent="store" class="btn btn-primary ms-auto mx-3" wire:loading.attr="disabled">{{ __('Enregistrer') }} </a>
                <a href="{{route('portal.lotissements.index')}}" class="btn btn-gray-200 text-gray-600 ">{{ __('Fermer') }}</a>
            </div>
        </div>
    </x-form-items.form>
</div>