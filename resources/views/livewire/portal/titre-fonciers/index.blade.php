<div>
    <x-alert />
    @include('livewire.portal.titre-fonciers.create')
    @include('livewire.portal.titre-fonciers.report')
    <x-delete-modal />
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
                        <li class="breadcrumb-item"><a href="/">{{__('Tableau de Bord')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Titres fonciers')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Titres fonciers')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('Voir tous les Titres Fonciers')}} </p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#RapportModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('Export')}}
                </a>
                @can('titre_foncier.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateTitreFoncierModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('Nouveau')}}
                </a>
                @endcan
                @can('titre_foncier.import')
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-outline-tertiary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">{{__('Opérations sur Titres Fonciers')}}</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('portal.lotissements.index')}}">{{__('Lotissement')}}</a>
                        <a class="dropdown-item" href="{{route('portal.lotissements.index')}}">{{__('Ventes')}}</a>
                        <a class="dropdown-item" href="{{route('portal.mutation-totale.index')}}">{{__('Mutation totale')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('portal.immobilier.index')}}">{{__('Releve Immo')}}</a>
                        <a class="dropdown-item" href="{{route('portal.certificate-propriete.index')}}">{{__('Certificat Proprieté')}}</a>
                        <a class="dropdown-item" href="{{route('portal.titre-fonciers-charges.index')}}">{{__('Charges')}}</a>
                        <a class="dropdown-item" href="{{route('portal.etat-cession.index')}}">{{__('Etat Cession')}}</a>
                    </div>
                </div>
                @endcan

            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{__('Recherche')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Trier par')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{__('Région')}}</option>
                <option value="date_de_delivrance_du_TF">{{__('Date Délivrance')}}</option>
                <option value="created_at">{{__('Date Création')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{__('Sens du tri')}}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{__('Ascendant')}}</option>
                <option value="desc">{{__('Descendant')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="perPage">{{__('Éléments par page')}}: </label>
            <select wire:model="perPage" id="perPage" class="form-select">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
        </div>
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{__('Numéro Titre Foncier')}}</th>
                        <th class="border-bottom">{{__('Numéro Conservation')}}</th>
                        <th class="border-bottom">{{__('Date Délivrance')}}</th>
                        <th class="border-bottom">{{__('Propriétaire(s)')}}</th>
                        <th class="border-bottom">{{__('Localisation')}}</th>
                        <th class="border-bottom">{{__('Limites')}}</th>
                        <th class="border-bottom">{{__('Coordonnées utm')}}</th>
                        <th class="border-bottom">{{__('Coordonnées long , lat')}}</th>
                        <th class="border-bottom">{{__('Statut')}}</th>
                        <th class="border-bottom">{{__('Date Création')}}</th>
                        @canany('titre_foncier.update','titre_foncier.delete')
                        <th class="border-bottom">{{__('Action')}}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($titrefonciers as $titrefoncier)
                    <tr>
                        <td>
                            <span class="fw-normal">{{$titrefoncier->numero_titre_foncier}}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{$titrefoncier->numero_conservation}}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{$titrefoncier->date_de_delivrance_du_TF}}</span>
                        </td>
                        <td>
                            <x-elements.user :options="$titrefoncier->users->take(5)" />
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Region')}} : <span class="fw-bolder mx-2"> {{$titrefoncier->region->region_name_fr}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Departement')}} : <span class="fw-bolder mx-2"> {{$titrefoncier->division->division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Arrondissement')}} : <span class="fw-bolder mx-2"> {{$titrefoncier->subDivision->sub_division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Lieu Dit')}} : <span class="fw-bolder mx-2"> {{$titrefoncier->lieu_dit}} </span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                <span class="fw-bolder mx-2"> {{__('Nord')}} </span> {{$titrefoncier->limit_nord}}
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                <span class="fw-bolder mx-2"> {{__('Sud')}} </span> {{$titrefoncier->limit_sud}}
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                <span class="fw-bolder mx-2"> {{__('Est')}} </span> {{$titrefoncier->limit_est}}
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                <span class="fw-bolder mx-2"> {{__('Ouest')}} </span> {{$titrefoncier->limit_ouest}}
                            </div>
                        </td>
                        <td>
                            @foreach(collect(json_decode($titrefoncier->coordonnees_utm,true)) as $key => $value)
                            <div class="d-flex align-items-centerpy-1">
                                <span class="fw-bolder mx-2"> {{ $key }} :</span> {{ $value}}
                            </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach(collect(json_decode($titrefoncier->coordonnees,true)) as $key => $value)
                            <div class="d-flex align-items-centerpy-1">
                                <span class="fw-bolder mx-2"> {{ $key }} :</span> {{ $value}}
                            </div>
                            @endforeach
                        </td>
                        <td>
                            <span class="fw-normal badge super-badge p-2 bg-{{$titrefoncier->EtatTFStyle}} round">{{$titrefoncier->etat_TF}}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{$titrefoncier->created_at->format('Y-m-d')}}</span>
                        </td>
                        @canany('titre_foncier.update','titre_foncier.delete')
                        <td>
                            @can('titre_foncier.view_detail')
                            <a href="#">
                                <svg class="icon icon-sm text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                            @endcan
                            @can('titre_foncier.view_detail')
                            <a href="{{route('portal.maps.index' , $titrefoncier->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-sm text-info">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                  </svg>                                  
                            </a>
                            @endcan
                            <a href="#" wire:click.prevent='printPdf({{$titrefoncier->id}})'>
                                <svg class="icon icon-sm text-gray-500"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                </svg>
                            </a>

                            @can('titre_foncier.update')
                            <a href="#" wire:click.prevent="initData({{$titrefoncier->id}})" data-bs-toggle="modal" data-bs-target="#CreateTitreFoncierModal" draggable="false">
                                <svg class="icon icon-sm text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            @endcan
                            @can('titre_foncier.delete')
                            <a href="#" wire:click.prevent="initData({{$titrefoncier->id}})" data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#" draggable="false">
                                <svg class="icon icon-sm text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @endcan
                        </td>
                        @endcanany
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">
                            <div class="text-center text-gray-800 mt-2">
                                <h4 class="fs-4 fw-bold">{{__('Liste vide')}}</h4>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{__('Montrer')}} {{$perPage > $titrefonciers_count ? $titrefonciers_count : $perPage  }} {{__('éléments sur')}} {{$titrefonciers_count}}
                </div>
                {{--{{ $titrefonciers->links() }}--}}
            </div>
        </div>
    </div>
</div>