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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Taxes Foncières') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Rapport sur les Taxe Foncières') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir tous les Taxe Foncieres') }} </p>
            </div>
        </div>
    </div>
    <div class="row  mb-3">
        <div class="col">
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
        <div class="col">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de TF avec Taxe') }}</h6>
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
        <div class="col">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Taux de Recouvrement') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $totalTaxAmountpaid }} {{ __('FCFA') }}</p>

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

        <div class="col">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Montant prédit de la Taxe') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $totalTaxAmountPrediction }} {{ __('FCFA') }}</p>

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
        <div class="col">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Pourcentage total des Taxes') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $percentagePaid }} {{ __('%') }}</p>

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


    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{ __('Recherche') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Recherche...') }}"
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
            <label for="direction">{{ __('Sens du tri') }}: </label>
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
            <label for="createdDate">{{ __('Date') }}: </label>
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

                        <th class="border-bottom">{{ __('Numéro du titre foncier') }}</th>
                        <th class="border-bottom">{{ __('Propriétaire(s)') }}</th>
                        <th class="border-bottom">{{ __('Localisation') }}</th>
                        <th class="border-bottom">{{ __('prix de la taxe') }}</th>
                        <th class="border-bottom">{{ __('Statut de la Taxe') }}</th>
                        <th class="border-bottom">{{ __('Date de paiement') }}</th>
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
                                @foreach ($titrefoncier->users as $user)
                                    <li>{{ $user->name }}</li>
                                @endforeach
                            </td>

                            <td>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Région') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->region->region_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Département') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->division->division_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Arrondissement') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->subDivision->sub_division_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Lieu Dit') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->lieu_dit }} </span>
                                </div>
                            </td>

                            <td>
                                <span class="fw-normal">
                                    @if ($titrefoncier->taxFoncier_amount !== null)
                                        {{ $titrefoncier->taxFoncier_amount }} {{ __('FCFA') }}
                                    @endif
                                </span>
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
                                    <a href='#' wire:click.prevent="sms({{ $titrefoncier->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                                          </svg>
                                    </a>
                                    @can('tax_foncier.update')
                                        @if ($titrefoncier->status_tax === 'non_payer')
                                            <a href='#' wire:click.prevent="initData({{ $titrefoncier->id }})"
                                                data-bs-toggle="modal" data-bs-target="#paiement">
                                                <svg class="icon icon-xs text-info" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                                </svg>
                                            </a>
                                        @else
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 30"
                                                    stroke="green">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>

                                            </span>
                                        @endif
                                    @endcan

                                </td>
                            @endcanany
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">
                                <div class="text-center text-gray-800 mt-2">
                                    <h4 class="fs-4 fw-bold">{{ __('Liste Vide') }}</h4>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{ __('Montrer') }} {{ $perPage > $titrefonciers_count ? $titrefonciers_count : $perPage }}
                    {{ __(' éléments sur ') }} {{ $titrefonciers_count }}
                </div>
                {{ $titrefonciers->links() }}
            </div>
        </div>
    </div>
</div>
