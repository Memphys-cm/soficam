<div>
    @include('livewire.portal.taxfonciere.suivi-taxfonciere.paiement')

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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Titres fonciers') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Rapport sur les titres fonciers') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir tous les titres fonciers') }} &#x23F0; </p>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de Titre Foncier') }}</h6>
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
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de TF avec Tax') }}</h6>
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
                        <p class="font-sans-serif lh-1 fs-4">{{ $totalTaxAmount }} {{ __('XAF') }}</p>

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
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Pourcentage total des Tax') }}</h6>
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


    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{ __('Recherche') }}: </label>
            <input wire:model="query" id="search" type="date" placeholder="{{ __('Jean...') }}"
                class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{ $resultCount }}</p>
        </div>
        <div class="col-md-2">
            <label for="selectedStatus">{{ __('par le statut') }}: </label>
            <select wire:model="selectedStatus" id="selectedStatus" class="form-select">
                <option value="">par le statut</option>
                <option value="payer">PAYER</option>
                <option value="non_payer">NON PAYER</option>

            </select>
        </div>

        <div class="col-md-2">
            <label for="direction">{{ __('Trier par ') }}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{ __('Ascendant') }}</option>
                <option value="desc">{{ __('Descendant') }}</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="perPage">{{ __('Éléments par page') }}: </label>
            <select wire:model="perPage" id="perPage" class="form-select">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="createdDate">{{ __('date') }}: </label>
            <input wire:model="query" id="createdDate" type="date" placeholder="{{ __('10/12/2022...') }}"
                class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{ $resultCount }}</p>
        </div>


    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('Proprietaire') }}</th>

                        <th class="border-bottom">{{ __('Numéro du titre foncier') }}</th>
                        <th class="border-bottom">{{ __('Localisation') }}</th>
                        <th class="border-bottom">{{ __('Tax Amount') }}</th>
                        <th class="border-bottom">{{ __('Statut de la Tax') }}</th>
                        <th class="border-bottom">{{ __('Date Paid') }}</th>
                        @canany('titre_foncier.update', 'titre_foncier.delete')
                            <th class="border-bottom">{{ __('Action') }}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($titrefonciers as $titrefoncier)
                        <tr>
                            <td>
                                @foreach ($titrefoncier->users as $user)
                                    <li>{{ $user->name }}</li>
                                @endforeach
                            </td>
                            <td>
                                <span class="fw-normal">{{ $titrefoncier->numero_titre_foncier }}</span>
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
                                <span class="fw-normal">{{ $titrefoncier->tax_amount }}</span>
                            </td>
                            <td>
                                <span
                                    class="fw-normal badge super-badge p-2 bg-{{ $titrefoncier->StatusTaxStyle }} round">{{ $titrefoncier->status_tax }}</span>
                            </td>
                            <td>
                                <span class="fw-normal">{{ $titrefoncier->date_tax }}</span>
                            </td>
                            @canany('tax_foncier.update', 'tax_foncier.view')
                                <td>
                                  
                                    @can('tax_foncier.update')
                                        {{-- <a href='#' wire:click.prevent="initData({{ $titrefoncier->id }})" data-bs-toggle="modal"
                                            data-bs-target="#paiement">
                                            <svg class="icon icon-xs" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="none"
                                                    d="M18.665,4.784H1.335c-0.479,0-0.866,0.388-0.866,0.866v8.665c0,0.479,0.388,0.866,0.866,0.866h17.33c0.479,0,0.866-0.388,0.866-0.866V5.65C19.531,5.172,19.144,4.784,18.665,4.784 M1.769,5.65c0.239,0,0.433,0.194,0.433,0.434S2.008,6.517,1.769,6.517c-0.24,0-0.434-0.193-0.434-0.433S1.529,5.65,1.769,5.65 M1.769,14.315c-0.24,0-0.434-0.194-0.434-0.434s0.194-0.433,0.434-0.433c0.239,0,0.433,0.193,0.433,0.433S2.008,14.315,1.769,14.315 M18.231,14.315c-0.239,0-0.433-0.194-0.433-0.434s0.193-0.433,0.433-0.433c0.24,0,0.434,0.193,0.434,0.433S18.472,14.315,18.231,14.315M18.665,12.662c-0.136-0.049-0.281-0.08-0.434-0.08c-0.718,0-1.3,0.583-1.3,1.3c0,0.152,0.031,0.298,0.08,0.434H2.989c0.048-0.136,0.08-0.281,0.08-0.434c0-0.717-0.583-1.3-1.3-1.3c-0.153,0-0.297,0.031-0.434,0.08V7.304c0.136,0.048,0.281,0.079,0.434,0.079c0.717,0,1.3-0.582,1.3-1.299c0-0.153-0.032-0.297-0.08-0.434h14.023c-0.049,0.136-0.08,0.281-0.08,0.434c0,0.718,0.582,1.299,1.3,1.299c0.152,0,0.298-0.031,0.434-0.079V12.662z M18.231,6.517c-0.239,0-0.433-0.193-0.433-0.433s0.193-0.434,0.433-0.434c0.24,0,0.434,0.194,0.434,0.434S18.472,6.517,18.231,6.517 M5.235,6.517H4.368c-0.24,0-0.433,0.194-0.433,0.433c0,0.24,0.193,0.433,0.433,0.433h0.867c0.239,0,0.433-0.193,0.433-0.433C5.668,6.711,5.474,6.517,5.235,6.517 M15.632,12.582h-0.866c-0.239,0-0.433,0.194-0.433,0.434s0.193,0.434,0.433,0.434h0.866c0.239,0,0.434-0.194,0.434-0.434S15.871,12.582,15.632,12.582 M10,6.517c-1.914,0-3.465,1.552-3.465,3.466c0,1.915,1.552,3.466,3.465,3.466c1.914,0,3.467-1.552,3.467-3.466C13.467,8.069,11.914,6.517,10,6.517 M11.795,9.474c-0.059,0.4-0.279,0.593-0.571,0.661c0.401,0.21,0.606,0.534,0.411,1.093c-0.241,0.694-0.815,0.753-1.579,0.607l-0.185,0.747L9.423,12.47l0.183-0.737c-0.116-0.028-0.234-0.06-0.356-0.093l-0.184,0.74l-0.447-0.111l0.185-0.749c-0.104-0.027-0.211-0.056-0.319-0.083l-0.582-0.146l0.222-0.516c0,0,0.33,0.088,0.325,0.082c0.127,0.032,0.183-0.051,0.205-0.107l0.292-1.18C8.964,9.573,8.98,9.578,8.995,9.581C8.978,9.573,8.961,9.569,8.949,9.566l0.208-0.842C9.163,8.627,9.13,8.507,8.949,8.461c0.006-0.004-0.325-0.082-0.325-0.082l0.119-0.48L9.36,8.054v0.002c0.092,0.023,0.188,0.045,0.285,0.067l0.184-0.74l0.447,0.113l-0.18,0.725c0.121,0.027,0.241,0.056,0.359,0.085l0.177-0.721l0.449,0.112l-0.184,0.74C11.464,8.634,11.876,8.928,11.795,9.474 M9.976,8.753L9.753,9.652c0.252,0.064,1.032,0.322,1.158-0.187C11.042,8.935,10.229,8.816,9.976,8.753 M9.641,10.106l-0.246,0.991c0.303,0.076,1.239,0.378,1.377-0.181C10.917,10.333,9.944,10.183,9.641,10.106">
                                                </path>
                                            </svg>
                                        </a> --}}
                                        <button wire:click.prevent="initData({{ $titrefoncier->id }})" data-bs-toggle="modal"
                                            data-bs-target="#paiement" class="btn btn-primary btn-sm"
                                            draggable="false">Paiement</button>
                                    @endcan

                                </td>
                            @endcanany
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">
                                <div class="text-center text-gray-800 mt-2">
                                    <h4 class="fs-4 fw-bold">{{ __('Opps rien ici') }} &#128540;</h4>
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
                    {{ __('éléments de') }} {{ $titrefonciers_count }}
                </div>
                {{ $titrefonciers->links() }}
            </div>
        </div>
    </div>
</div>
