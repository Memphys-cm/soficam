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
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/">{{ __('Tableau de bord') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Titres Fonciers') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Rapport sur les Titres Fonciers') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir tous les Titres Fonciers') }} </p>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de Titres Fonciers') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $titrefonciers_count }} {{ __('TF') }}</p>

                    </div>
                    <div class="">
                        <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de TF avec Taxe Foncière') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $titrefonciers_with_tax }} {{ __('TF') }}</p>

                    </div>
                    <div class="">
                        <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Taux de Recouvrement') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $totalTaxAmount }} {{ __('FCFA') }}</p>

                    </div>
                    <div class="">
                        <svg class="icon text-success" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 1v6m0 10v6m-6-3h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v6a3 3 0 003 3z">
                            </path>
                        </svg>



                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Pourcentage total des Taxes') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $tax_paid_percentage }} {{ __('%') }}</p>

                    </div>
                    <div class="">
                        <svg class="icon text-warning" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 12a2 2 0 012-2h6a2 2 0 012 2m-2 8h-4a2 2 0 01-2-2V6a2 2 0 012-2h4a2 2 0 012 2v12a2 2 0 01-2 2z">
                            </path>
                        </svg>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class='card px-3 mb-3'>
        <div class="row py-3">
            <div class="col">
                <label for="selectedRegion">{{ __('Par Région') }}: </label>
                <select wire:model="selectedRegion" id="selectedRegion" class="form-select">
                    <option value="">Toutes les régions</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->region_name_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="selectedDivision">{{ __('Par Département') }}: </label>
                <select wire:model="selectedDivision" id="selectedDivision" class="form-select">
                    <option value="">Tous les Départements</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->division_name_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="selectedSubDivision">{{ __('Par Arrondissement') }}: </label>
                <select wire:model="selectedSubDivision" id="selectedSubDivision" class="form-select">
                    <option value="">Tous les Arrondissements</option>
                    @foreach ($sub_divisions as $sub_division)
                        <option value="{{ $sub_division->id }}">{{ $sub_division->sub_division_name_en }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row py-3">
            <div class="col">
                <label for="startDate">Date de début:</label>
                <input type="date" wire:model="startDate" class="form-control" id="startDate">
            </div>
            <div class="col">
                <label for="endDate">Date de fin:</label>
                <input type="date" wire:model="endDate" class="form-control" id="endDate">
            </div>
            <div class="col">
                <label for="selectedStatus">{{ __('Par la Charge ') }}: </label>
                <select wire:model="selectedStatus" id="selectedStatus" class="form-select">
                    <option value="">par le statut</option>
                    <option value="HYPOTHEQUE">HYPOTHÈQUE</option>
                    <option value="PRENOTE">PRENOTATION</option>
                    <option value="SUSPENDU">SUSPENDU</option>
                    <option value="RETRAIT">RETRAIT</option>
                    <option value="ANNULATION">ANNULÉ</option>
                </select>
            </div>
        </div>
    </div>
    <div class='card px-3 mb-3'>
        <div class="row py-3">
            <div class="col-md-3">
                <label for="search">{{ __('Recherche') }}: </label>
                <input wire:model="query" id="search" type="text" placeholder="{{ __('Recherche...') }}"
                    class="form-control">
                <p class="badge badge-info" wire:model="resultCount">{{ $resultCount }}</p>
            </div>
            <div class="col-md-3">
                <label for="orderBy">{{ __('Trier par') }}: </label>
                <select wire:model="orderBy" id="orderBy" class="form-select">
                    <option value="region_id">{{ __('Région') }}</option>
                    <option value="date_de_delivrance_du_TF">{{ __('Date de délivrance') }}</option>
                    <option value="created_at">{{ __('Date Creation') }}</option>
                </select>
            </div>
    
            <div class="col-md-3">
                <label for="direction">{{ __('Sens du Tri ') }}: </label>
                <select wire:model="orderAsc" id="direction" class="form-select">
                    <option value="asc">{{ __('Ascendant') }}</option>
                    <option value="desc">{{ __('Descendant') }}</option>
                </select>
            </div>
    
            <div class="col-md-3">
                <label for="perPage">{{ __('Éléments par page') }}: </label>
                <select wire:model="perPage" id="perPage" class="form-select">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('Numéro du Titre Foncier') }}</th>
                        <th class="border-bottom">{{ __('Date de délivrance') }}</th>
                        <th class="border-bottom">{{ __('Propriétaire(s)') }}</th>
                        <th class="border-bottom">{{ __('Localisation') }}</th>
                        <th class="border-bottom">{{ __('Limites') }}</th>
                        <th class="border-bottom">{{ __('Coordonnées') }}</th>
                        <th class="border-bottom">{{ __('Statut') }}</th>
                        <th class="border-bottom">{{ __('Date création') }}</th>
                        @canany('titre_foncier.update', 'titre_foncier.delete')
                            <th class="border-bottom">{{ __('Action') }}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($titrefonciers as $titrefoncier)
                        <tr>
                            <td>
                                <span class="fw-normal">{{ $titrefoncier->numero_titre_foncier }}</span>
                            </td>
                            <td>
                                <span class="fw-normal">{{ $titrefoncier->date_de_delivrance_du_TF }}</span>
                            </td>

                            <td>
                                <x-elements.user :options="$titrefoncier->users->take(5)" />
                            </td>
                            <td>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Region') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->region->region_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Division') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->division->division_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Sub Divi') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->subDivision->sub_division_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Lieu Dit') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->lieu_dit }} </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-centerpy-1">
                                    <span class="fw-bolder mx-2"> {{ __('Nord') }} </span>
                                    {{ $titrefoncier->limit_nord }}
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    <span class="fw-bolder mx-2"> {{ __('Sud') }} </span>
                                    {{ $titrefoncier->limit_sud }}
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    <span class="fw-bolder mx-2"> {{ __('Est') }} </span>
                                    {{ $titrefoncier->limit_est }}
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    <span class="fw-bolder mx-2"> {{ __('Ouest') }} </span>
                                    {{ $titrefoncier->limit_ouest }}
                                </div>
                            </td>
                            <td>
                                @foreach (collect(json_decode($titrefoncier->coordonnees, true)) as $key => $value)
                                    <div class="d-flex align-items-centerpy-1">
                                        <span class="fw-bolder mx-2"> {{ $key }} :</span>
                                        {{ $value }}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                <span
                                    class="fw-normal badge super-badge p-2 bg-{{ $titrefoncier->EtatTFStyle }} round">{{ $titrefoncier->etat_TF }}</span>
                            </td>
                            <td>
                                <span class="fw-normal">{{ $titrefoncier->created_at->format('Y-m-d') }}</span>
                            </td>
                            @canany('titre_foncier.update', 'titre_foncier.delete')
                                <td>
                                    @can('titre_foncier.view_detail')
                                        <a href="#">
                                            <svg class="icon icon-sm text-info" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </a>
                                    @endcan
                                    @can('titre_foncier.update')
                                        <a href="#" wire:click.prevent="initData({{ $titrefoncier->id }})"
                                            data-bs-toggle="modal" data-bs-target="#CreateTitreFoncierModal"
                                            draggable="false">
                                            <svg class="icon icon-sm text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endcan
                                    @can('titre_foncier.delete')
                                        <a href="#" wire:click.prevent="initData({{ $titrefoncier->id }})"
                                            data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#"
                                            draggable="false">
                                            <svg class="icon icon-sm text-danger me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
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
                                    <h4 class="fs-4 fw-bold">{{ __('Liste Vide') }}</h4>
                                    <p>{{ __('Aucun enregistrement trouvé..!') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{ __('Montrer') }} {{ $perPage > $titrefonciers_count ? $titrefonciers_count : $perPage }}
                    {{ __('éléments sur') }} {{ $titrefonciers_count }}
                </div>
                {{ $titrefonciers->links() }}
            </div>
        </div>
    </div>
</div>
