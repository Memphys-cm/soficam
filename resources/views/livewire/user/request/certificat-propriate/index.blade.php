<div>
    @include('livewire.user.request.certificat-propriate.create')
    <div class='container pt-3 pt-lg-4 pb-4 pb-lg-3 text-white'>
        <div class='d-flex flex-wrap align-items-center  justify-content-between '>
            <a href="{{ route('user.dashboard') }}" sclass="">
                <svg class="icon me-1 text-gray-700 bg-gray-300 rounded-circle p-2" style="height : 2.5rem;" fill="none"
                    stroke="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <x-navigation.user-nav />
            </div>
        </div>
        <div class='d-flex flex-wrap justify-content-between align-items-center pt-3'>
            <div class=''>
                <h1 class='fw-bold display-4 text-gray-600 d-inline-flex align-items-end'>
                    <svg class="icon icon-lg me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span>
                        {{ __('Demande de Certificat de Propriéte') }}
                    </span>
                </h1>
                <p class="text-gray-800">{{ __('Voir toutes les Demande de Certificat de Propriéte') }} </p>
            </div>
            <div class=''>

            </div>
        </div>

        <div class="d-flex justify-content-end mb-2">

            <a href="#" data-bs-toggle="modal" data-bs-target="#CreatecertificateproprieteModal"
                class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> {{ __('Faire une Nouvelle Démande') }}
            </a>
            {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#importUsersModal"
                class="btn btn-sm btn-secondary py-2 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>{{ __('Démande Courante') }}
            </a> --}}
        </div>

        <div class="row pt-4 pb-2 text-gray-600 ">
            <div class="col-md-3 mb-2">
                <label for="search">{{ __('Recherche') }}: </label>
                <input wire:model="query" id="search" type="text" placeholder="{{ __('Recherche...') }}"
                    class="form-control">
                <p class="badge badge-info" wire:model="resultCount">{{ $resultCount }}</p>
            </div>
            <div class="col-md-3 mb-2">
                <label for="orderBy">{{ __('Trier par') }}: </label>
                <select wire:model="orderBy" id="orderBy" class="form-select">
                    <option value="action_type">{{ __('Type d\'action') }}</option>
                    <option value="created_at">{{ __('Date Création') }}</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <label for="direction">{{ __('Sens de tri') }}: </label>
                <select wire:model="orderAsc" id="direction" class="form-select">
                    <option value="asc">{{ __('Ascendant ') }}</option>
                    <option value="desc">{{ __('Descendant') }}</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
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
        <x-alert />

        @if (count($certificats) > 0)
            <div class="card">

                <div class="table-responsive pb-3 text-gray-700">
                    <table class="table employee-table table-hover align-items-center ">
                        <thead>
                            <tr>
                                <th class="border-bottom">{{ __('Numéro du titre foncier') }}</th>
                                <th class="border-bottom">{{ __('PropriÉtaire(s)') }}</th>
                                <th class="border-bottom">{{ __('Date de Démande') }}</th>
                                <th class="border-bottom">{{ __('Statut de la Démande') }}</th>
                                <th class="border-bottom">{{ __('Date de Paiement') }}</th>
                                <th class="border-bottom">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($certificats as $certificat)
                                <tr>
                                    <td>
                                        <span class="fw-normal">{{ $certificat->titrefoncier->numero_titre_foncier }}
                                        </span>
                                    </td>
                                    <td>
                                        @foreach ($certificat->titreFoncier->users as $user)
                                            <li>{{ $user->name }}</li>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="fw-normal">{{ $certificat->created_at->format('d/m/Y') }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-normal">{{ $certificat->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-normal">{{ $certificat->created_at->format('d/m/Y') }}</span>
                                    </td>
                                    <td>
                                        @if ($certificat->status === 'active')
                                            <a href="#" wire:click.prevent='printPdf({{ $certificat->id }})'
                                                title="Imprimer le document">
                                                <svg class="icon icon-sm text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                </svg>
                                            </a>
                                        @else
                                            {{ __('No Action') }}
                                        @endif
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div class="text-center text-gray-800 mt-2">
                                            <h4 class="fs-4 fw-bold">{{ __('Liste vide') }}</h4>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                        <div>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class='border-prim rounded p-4 d-flex justify-content-center align-items-center flex-column'>
                <img src="{{ asset('/img/empty.svg') }}" alt='{{ __('Empty') }}' class="text-center  w-25 h-25">
                <div class="text-center text-gray-800 mt-2">
                    <h4 class="fs-4 fw-bold">{{ __('Liste Vide') }}</h4>
                </div>
            </div>
        @endif
    </div>
</div>
