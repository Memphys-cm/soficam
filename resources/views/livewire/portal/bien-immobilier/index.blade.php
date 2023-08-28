<div>
    <x-alert />
    @include('livewire.portal.bien-immobilier.create')
    @include('livewire.portal.bien-immobilier.edit')
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
                        <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Biens Immobiliers') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Bien Immobilier') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir tous les Biens Immobiliers dans l\'application') }} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('immobilier.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateEstateModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{ __('Nouveau') }}
                </a>
                @endcan
                <a href="{{route('portal.qrcode')}}" class="btn btn-primary">Scanner</a> 
                @can('immobilier.export_n_print')
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
                @endcan
            </div>
        </div>
    </div>

    <x-alert />

    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{ __('Recherche') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Recherche...') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{ __('Trier par') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="type">{{ __('type') }}</option>
                <option value="releve_number">{{ __('Releve N') }}</option>
                <option value="requestor_id">{{ __('Requerant') }}</option>
                <option value="price">{{ __('Prix') }}</option>
                <option value="validity">{{ __('Validité') }}</option>
                <option value="status">{{ __('Statut') }}</option>
                <option value="created_at">{{ __('Date creation') }}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{ __('Direction du trie') }}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{ __('Ascendante') }}</option>
                <option value="desc">{{ __('Descendante') }}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="perPage">{{ __('Elements par page') }}: </label>
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
                        <th class="border-bottom">{{ __('Requerant') }}</th>
                        <th class="border-bottom">{{ __('Numéro Titre Foncier') }}</th>
                        <th class="border-bottom">{{ __(' NUMERO BIEN IMMO') }}</th>
                        <th class="border-bottom">{{ __('PRIX') }}</th>
                        <th class="border-bottom">{{ __('VALIDITE') }}</th>
                        <th class="border-bottom">{{ __(' TYPE PERSONNE') }}</th>
                        <th class="border-bottom">{{ __('STATUT') }}</th>
                        <th class="border-bottom">{{ __('Date creation') }}</th>
                        {{--@canany(['immobilier.edit','immobilier.delete'])--}}
                        <th class="border-bottom">{{ __('Action') }}</th>
                        {{--@endcanany--}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($bien_immobiliers as $bien_immobilier)
                    <tr>
                        <td>
                            <x-elements.user :options="$bien_immobilier->requestor" />
                        </td>
                        <td>
                            {{ $bien_immobilier->titreFoncier->numero_titre_foncier}}
                        </td>
                        <td>{{ $bien_immobilier->releve_number }}</td>

                        <td>{{ $bien_immobilier->price }} {{ __('XAF') }}</td>
                        <td>{{ $bien_immobilier->validity }}</td>
                        <td>{{ $bien_immobilier->releves_type }}</td>

                        <td>

                            <span class="fw-normal badge super-badge p-2 bg-{{$bien_immobilier->statusStyle}} round">{{$bien_immobilier->status}}</span>

                        </td>
                        <td>{{ $bien_immobilier->created_at }}</td>
                        <td>
                            <button wire:click='printPdf({{$bien_immobilier->id}})' class="btn btn-primary">PDF</button>
                            <a href='#' wire:click.prevent="initData({{ $bien_immobilier->id }})" data-bs-toggle="modal" data-bs-target="#BienUpdateModal">
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <a href='#' wire:click.prevent="initData({{ $bien_immobilier->id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                                <svg class="icon icon-xs text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">
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
                    {{__('Montrer')}} {{$perPage > $bien_immobiliers_count ? $bien_immobiliers_count : $perPage  }} {{__('element de')}} {{$bien_immobiliers_count}}
                </div>
                {{ $bien_immobiliers->links()  }}
            </div>
        </div>
    </div>
</div>