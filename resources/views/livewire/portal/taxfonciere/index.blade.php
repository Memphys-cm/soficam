<div>
    @include('livewire.portal.taxfonciere.paiement')
            <x-alert />
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
                        <li class="breadcrumb-item active" aria-current="page">{{__('Taxfonciere')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Taxes foncieres')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('Voir tous les Taxes foncieres')}} &#x23F0; </p>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{__('Recherche')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Trier par')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{__('Region')}}</option>
                <option value="date_de_delivrance_du_TF">{{__('Date Delivrance')}}</option>
                <option value="created_at">{{__('Date Creation')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{__('Direction Trie')}}: </label>
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
                        <th class="border-bottom">{{__('Numero Titre Foncier')}}</th>
                        <th class="border-bottom">{{__('Proprietaires')}}</th>
                        <th class="border-bottom">{{__('Prix')}}</th>
                        <th class="border-bottom">{{__('Statut')}}</th>
                        <th class="border-bottom">{{__('Date')}}</th>
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
                            <x-elements.user :options="$titrefoncier->users->take(5)" />
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                 <span class="fw-bolder mx-2"> {{$titrefoncier->tax_amount}} </span>
                            </div>
                            
                        </td>
                        <td>
                            <span class="fw-normal">{{$titrefoncier->date_tax}}</span>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#paiement"  class="btn btn-primary">Paiement</button>
                        </td>
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
                    {{-- {{__('Montrer')}} {{$perPage > $titrefonciers_count ? $titrefonciers_count : $perPage  }} {{__('element de')}} {{$titrefonciers_count}} --}}
                </div>
                {{-- {{ $titrefonciers->links() }} --}}
            </div>
        </div>
    </div>
</div>
