
    <div>
        <div class='container pt-3 pt-lg-4 pb-4 pb-lg-3 text-white'>
            <div class='d-flex flex-wrap align-items-center  justify-content-between '>
                <a href="{{route('user.dashboard')}}" sclass="">
                    <svg class="icon me-1 text-gray-700 bg-gray-300 rounded-circle p-2" style="height : 2.5rem;" fill="none" stroke="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <x-navigation.user-nav />
                </div>
            </div>
            <div class='d-flex flex-wrap justify-content-between align-items-center pt-3'>
                <div class=''>
                    <h1 class='fw-bold display-4 text-gray-600 d-inline-flex align-items-end'>
                        <svg class="icon icon-lg me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        {{ __('Suivi Dossier') }}
                    </h1>
                    <p class="text-gray-800">{{__('Voir tous les Dossiers')}} </p>
                </div>
                <div class=''>
    
                </div>
            </div>
          
            <div class="row pt-4 pb-2 text-gray-600 ">
                <div class="col-md-3 mb-2">
                    <label for="search">{{__('Recherche')}}: </label>
                    <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
                    
                </div>
                <div class="col-md-3 mb-2">
                    <label for="orderBy">{{__('Trier par')}}: </label>
                    <select wire:model="orderBy" id="orderBy" class="form-select">
                        <option value="action_type">{{__('Type d\'action')}}</option>
                        <option value="created_at">{{__('Date Creation')}}</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <label for="direction">{{__('Sens de tri')}}: </label>
                    <select wire:model="orderAsc" id="direction" class="form-select">
                        <option value="asc">{{__('Ascendant ')}}</option>
                        <option value="desc">{{__('Descendant')}}</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <label for="perPage">{{__('Element par page')}}: </label>
                    <select wire:model="perPage" id="perPage" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                    </select>
                </div>
            </div>
            <x-alert />
    
            
            <div class="card">
    
                <div class="table-responsive pb-3 text-gray-700">
                    <table class="table employee-table table-hover align-items-center ">
                        <thead>
                            <tr>
                                <th class="border-bottom">{{ __('Reférence') }}</th>
                                <th class="border-bottom">{{ __('Nom Dossier') }}</th>
                                <th class="border-bottom">{{ __('Statut') }}</th>
                                <th class="border-bottom">{{ __('Date Création') }}</th>
                                <th class="border-bottom">{{ __('Action') }}</th>
    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($immatriculations as $item)
                            <tr>
                                <td>
                                    {{ $item->reference}}
                                </td>
    
                                <td>{{ __('Immatriculation Directe') }}</td>
                                <td>{{ $item->statut }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{ route('user.suivi-dossier.follow', ['code' => $item->reference]) }}">Details</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    <div class="text-center text-gray-800 mt-2">
                                        <h4 class="fs-4 fw-bold">{{ __('Liste Vide') }} </h4>
                                        <p>{{ __('Aucun enregistrement trouvé..!') }}</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                  
                </div>
            </div>
          
        </div>
    </div>