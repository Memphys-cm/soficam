<div>
    <x-alert />
    @include('livewire.portal.immatriculation-directe.layout.import')
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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Immatriculation Directes') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('mmatriculation Directes') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir Toutes les Immatriculation Directes') }} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('titre_foncier.create')
                    <a href="#" data-bs-toggle="modal" data-bs-target="#CreateImmaDirecteModal"
                        class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg> {{ __('Nouveau') }}
                    </a>
                @endcan
                @can('titre_foncier.import')
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-outline-tertiary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">{{ __('Operations on Land Title') }}</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Autre Action</a>
                            <a class="dropdown-item" href="#">Autre chose ici</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Lien séparé</a>
                        </div>
                    </div>
                @endcan

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
        <div class="col-md-3">
            <label for="orderBy">{{ __('Trier par') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{ __('Region') }}</option>
                <option value="date_de_delivrance_du_TF">{{ __('Date de livraison') }}</option>
                <option value="created_at">{{ __('Date de création') }}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{ __('Sens du tri') }}: </label>
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
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('Numero Reference') }}</th>
                        {{-- <th class="border-bottom">{{ __('Date de Delivrance') }}</th> --}}
                        {{-- <th class="border-bottom">{{__('Requerants Principales')}}</th> --}}
                        <th class="border-bottom">{{ __('Requerants Secondaires') }}</th>
                        <th class="border-bottom">{{ __('Localisation') }}</th>
                        <th class="border-bottom">{{ __('Superficie') }}</th>
                        <th class="border-bottom">{{ __('Statut') }}</th>
                        <th class="border-bottom">{{ __('Prochaine Etape') }}</th>
                        <th class="border-bottom">{{ __('Date de création') }}</th>
                        @canany('titre_foncier.update', 'titre_foncier.delete')
                            <th class="border-bottom">{{ __('Action') }}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($imma_directes as $imma_directe)
                        <tr>
                            <td>
                                <span class="fw-normal"> {{ $imma_directe->reference }} </span>
                            </td>
                            <td>
                                <x-elements.user :options="$imma_directe->users->take(5)" />
                            </td>
                            <td>
                                <span class="fw-normal"> {{ $imma_directe->localisation }} </span>
                            </td>
                            <td>
                                <span class="fw-normal"> {{ $imma_directe->superficie }} {{ __('m2') }} </span>
                            </td>
                            <td>
                                <span
                                    class="fw-normal badge super-badge p-2 bg-{{ $imma_directe->StatutStyle }} round">{{ $imma_directe->statut }}</span>
                            </td>
                            <td>
                                <span class="fw-normal badge super-badge p-2 bg-secondary">
                                    {{ $imma_directe->next_step }} </span>
                            </td>
                            <td>
                                <span class="fw-normal">{{ $imma_directe->created_at->format('Y-m-d') }}</span>
                            </td>
                           
                            @include('livewire.portal.immatriculation-directe.layout.action')
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
                    {{ __('Affichage') }} {{ $perPage > $imma_directes_count ? $imma_directes_count : $perPage }}
                    {{ __('éléments de') }} {{ $imma_directes_count }}
                </div>
                {{ $imma_directes->links() }}
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endpush
