<div>
    <x-alert />
    @include('livewire.portal.sales.all-sales.update')
    @include('livewire.portal.sales.all-sales.pay')

    <x-delete-modal />
    <div class='p-0'>
        <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
            <div class="mb-lg-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Recettes Totales') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Gestion des ventes totales') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir toutes les Recettes totales dans l\'application') }}</p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                {{-- @can('user.export_n_print') --}}
                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center ">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        {{ __('Exporter') }}
                    </a>
                </div>
                <div class="text-center mx-2" wire:loading wire:target="export">
                    <div class="text-center">
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                    </div>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
    </div>
    <x-alert />

    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{ __('Recherche') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Jean...') }}" class="form-control">
            {{-- <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p> --}}
        </div>
        <div class="col-md-2">
            <label for="selectedStatus">{{ __('par le statut') }}: </label>
            <select wire:model="selectedStatus" id="selectedStatus" class="form-select">
                <option value="">par le statut</option>
                <option value="totally_paid">Payé</option>
                <option value="pending_payment">Non payé</option>

            </select>
        </div>
        <div class="col-md-2">
            <label for="orderBy">{{ __('Trier par') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="sales_amount">{{ __('Montant de la vente') }}</option>
                <option value="sales_type">{{ __('Type de vente') }}</option>
                <option value="created_at">{{ __('Date de création') }}</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="direction">{{ __('Sens du tri') }}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{ __('Ascendante') }}</option>
                <option value="desc">{{ __('Descendante') }}</option>
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
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('REQUÉRANT') }}</th>
                        <th class="border-bottom">{{ __('REFÉRENCE') }}</th>
                        <th class="border-bottom">{{ __('MODE DE PAIEMENT') }}</th>
                        <th class="border-bottom">{{ __('TYPE DE VENTE') }}</th>
                        <th class="border-bottom">{{ __('Montant de la vente') }}</th>
                        <th class="border-bottom">{{ __('État des paiements') }}</th>
                        <th class="border-bottom">{{ __('Créé par') }}</th>
                        <th class="border-bottom">{{ __('Date de création') }}</th>
                        {{-- @canany('user.update', 'user.delete') --}}
                        <th class="border-bottom">{{ __('Action') }}</th>
                        {{-- @endcanany --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($allsaless as $allsale)
                    <tr>
                        <td>
                            @if ($allsale->user)
                            <a href="#" class="d-flex align-items-center">
                                <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3">
                                    <span class="text-white">{{ initials($allsale->user->first_name) }}</span>
                                </div>
                                <div class="d-block">
                                    <span class="fw-bold">{{ $allsale->user->first_name }}</span>
                                </div>
                            </a>
                            {{-- @else
                            User not found --}}
                            @endif
                        </td>

                        <td>{{ $allsale->sales_code }}</td>
                        <td>{{ $allsale->payment_method }}</td>
                        <td>{{ $allsale->sales_type }}</td>
                        <td>{{ $allsale->sales_amount }} {{ __('FCFA') }}</td>
                        <td>

                            <span class="fw-normal badge super-badge p-2 bg-{{ $allsale->statusStyle }} round">{{ $allsale->payment_status }}</span>

                        </td>
                        <td>{{ $allsale->created_by }}</td>
                        <td>{{ $allsale->created_at }}</td>

                        <td>
                            @if ($allsale->payment_status === 'en attente')
                            <a href='#' wire:click.prevent="initData({{ $allsale->id }})" data-bs-toggle="modal" data-bs-target="#updatePaySaleModal">
                                <svg class="icon icon-xs text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>
                            </a>
                            @endif
                          
                            {{-- <a href='#' data-bs-toggle="modal" data-bs-target="#updateAllSalesModal">
                                <svg class="icon icon-xs " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                                </svg>

                            </a> --}}

                            @can('sales.delete')
                            <a href='#' wire:click.prevent="initData({{ $allsale->id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                                <svg class="icon icon-xs text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">
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
                    {{ __('Montrer') }} {{ $perPage > $allsales_count ? $allsales_count : $perPage }}
                    {{ __(' éléments sur') }} {{ $allsales_count }}
                </div>
                {{ $allsaless->links() }}
            </div>
        </div>
    </div>
</div>