<div>
    <x-alert />
    {{-- @include('livewire.user.suivi-dossier.follow') --}}
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
                        <li class="breadcrumb-item"><a href="/">{{ __('Tableau de Bord') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Suivi Dossier') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Suivi Dossier') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir tous les Dossier') }} &#x23F0; </p>
            </div>

        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{ __('Recherche') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Recherche...') }}"
                class="form-control">
            {{-- <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p> --}}
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{ __('Trier par') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{ __('Region') }}</option>
                <option value="date_de_delivrance_du_TF">{{ __('Date Delivrance') }}</option>
                <option value="created_at">{{ __('Date Creation') }}</option>
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
                        <th class="border-bottom">{{ __('Proprietaires') }}</th>
                        <th class="border-bottom">{{ __('Nom Dossier') }}</th>
                        <th class="border-bottom">{{ __('Statut') }}</th>
                        <th class="border-bottom">{{ __('Date Creation') }}</th>
                        <th class="border-bottom">{{ __('Action') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($immatriculations as $item)
                        <tr>
                            @foreach ($item->users as $user)
                                    <td>{{ $user->name }}</td>
                                @endforeach
                            <td>{{ getTypeName($item) }}</td>
                            <td>{{ getStatut($item) }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td><td class="text-center">
                                <a class="btn btn-primary" href="{{route('follow')}}">Suivre</a>
                            </td></td>
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
                    {{ __('Montrer') }} {{ __('element de') }}
                </div>
            </div>
        </div>
    </div>
</div>

@php
    function getTypeName($item)
    {
        if ($item instanceof \App\Models\TitreFoncier) {
            return 'Taxe foncière';
        } elseif ($item instanceof \App\Models\Lotissements\Parcel) {
            return 'Mutation totale';
        } elseif ($item instanceof \App\Models\ImmatriculationDirecte) {
            return 'Immatriculation Directe';
        }
    }
    
    function getNom($item)
    {
        if ($item instanceof \App\Models\TitreFoncier) {
            return $item->nom;
        } elseif ($item instanceof \App\Models\Lotissements\Parcel) {
            return $item->name; // Changer "name" par le nom d'attribut correct
    } elseif ($item instanceof \App\Models\ImmatriculationDirecte) {
        return $item->autre_nom; // Changer "autre_nom" par le nom d'attribut correct
        }
    }
    
    function getStatut($item)
    {
        if ($item instanceof \App\Models\TitreFoncier) {
            return $item->status_tax;
        } elseif ($item instanceof \App\Models\Lotissements\Parcel) {
            return $item->status; // Changer "status" par le nom d'attribut correct
    } elseif ($item instanceof \App\Models\ImmatriculationDirecte) {
        return $item->le_status_tax; // Changer "le_statut" par le nom d'attribut correct
        }
    }
@endphp
