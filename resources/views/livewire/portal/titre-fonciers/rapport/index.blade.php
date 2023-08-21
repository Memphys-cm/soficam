<div>
    <x-alert />
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
                        <li class="breadcrumb-item"><a href="/">{{__('Tableau de bord')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Titres Fonciers')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Land Titles Report')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('Voir tous les titres fonciers')}} &#x23F0; </p>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col">
            <label for="selectedRegion">{{__('par Regions')}}: </label>
            <select wire:model="selectedRegion" id="selectedRegion" class="form-select">
                <option value="">Toutes les Regions</option>
                @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->region_name_en}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="selectedDivision">{{__('par Divisions')}}: </label>
            <select wire:model="selectedDivision" id="selectedDivision" class="form-select">
                <option value="">Toutes les Divisions</option>
                @foreach ($divisions as $division)
                    <option value="{{$division->id}}">{{$division->division_name_en}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="selectedSubDivision">{{__('by Subdivisions')}}: </label>
            <select wire:model="selectedSubDivision" id="selectedSubDivision" class="form-select">
                <option value="">Toutes les Sub-Divisions</option>
                @foreach ($sub_divisions as $sub_division)
                    <option value="{{$sub_division->id}}">{{$sub_division->sub_division_name_en}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row p-3">
        <div class="col">
            <label for="startDate">Date Debut:</label>
            <input type="date" wire:model="startDate" class="form-control" id="startDate">
        </div>
        <div class="col">
            <label for="endDate">Date Fin:</label>
            <input type="date" wire:model="endDate" class="form-control" id="endDate">
        </div>
        <div class="col">
            <label for="selectedStatus">{{__('by Status')}}: </label>
            <select wire:model="selectedStatus" id="selectedStatus" class="form-select">
                <option value="">Par Statut</option>
                <option value="HYPOTHEQUE">HYPOTHEQUE</option>
                <option value="PRENOTE">PRENOTE</option>
                <option value="SUSPENDU">SUSPENDU</option>
                <option value="DISPONIBLE">DISPONIBLE</option>
            </select>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{__('Recherche')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Trier par')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{__('Region')}}</option>
                <option value="date_de_delivrance_du_TF">{{__('Date Delivrance')}}</option>
                <option value="created_at">{{__('Date creation')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{__('Trier par direction')}}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{__('Ascendant')}}</option>
                <option value="desc">{{__('Descendant')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="perPage">{{__('Elements par page')}}: </label>
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
                        <th class="border-bottom">{{__('Numero du titre foncier')}}</th>
                        <th class="border-bottom">{{__('Date de delivrance')}}</th>
                        <th class="border-bottom">{{__('Proprietaires')}}</th>
                        <th class="border-bottom">{{__('Localisation')}}</th>
                        <th class="border-bottom">{{__('Limites')}}</th>
                        <th class="border-bottom">{{__('Coordonnees')}}</th>
                        <th class="border-bottom">{{__('Statut')}}</th>
                        <th class="border-bottom">{{__('Date creation')}}</th>
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
                            <span class="fw-normal">{{$titrefoncier->date_de_delivrance_du_TF}}</span>
                        </td>

                        <td>
                            <x-elements.user :options="$titrefoncier->users->take(5)" /> 
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Region')}} : <span class="fw-bolder mx-2"> {{$titrefoncier->region->region_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Division')}} : <span class="fw-bolder mx-2"> {{$titrefoncier->division->division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Sub Divi')}} : <span class="fw-bolder mx-2"> {{$titrefoncier->subDivision->sub_division_name}} </span>
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
                                <h4 class="fs-4 fw-bold">{{__('Opps rien ici')}} &#128540;</h4>
                                <p>{{__('Aucun enregistrement trouvé..!')}}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{__('Montrer')}} {{$perPage > $titrefonciers_count ? $titrefonciers_count : $perPage  }} {{__('éléments de')}} {{$titrefonciers_count}}
                </div>
                {{ $titrefonciers->links() }}
            </div>
        </div>
    </div>
</div>