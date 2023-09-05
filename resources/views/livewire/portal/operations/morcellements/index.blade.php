<div>
    @if ($errors->any())
    <div class="alert alert-danger alert-fixed border-danger-dash alert-important alert-dimissable ">
        <div class='d-flex justify-content-between align-items-start'>

            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li class="px-n4">{{ $error }}</li>
                @endforeach
            </ul>


            <div class='d-flex justify-content-end align-items-start'>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
    <x-alert />
    @include('livewire.portal.operations.morcellements.partials.create-form')
    <x-delete-modal />
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
                        <li class="breadcrumb-item"><a href="/">{{__('Tableau de bord')}}</a></li>
                        <li class="breadcrumb-item">{{__('Opérations')}}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Morcellements')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Morcellements')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('Voir tous les morcellements')}} </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('operation.morcellement.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateMorcellementNormaleModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('Nouveau')}}
                </a>
                @endcan
                @can('operation.morcellement.forcee')
                @livewire('portal.operations.morcellements.partials.create-morcellement-forcee')
                @endcan
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{__('Recherche')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Trier par')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{__('Région')}}</option>
                <option value="date_de_delivrance_du_TF">{{__('Date de délivrance')}}</option>
                <option value="created_at">{{__('Date Création')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{__('Sens du tri')}}: </label>
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
                        <th class="border-bottom">{{__(' Nombre Mutation totale')}}</th>
                        <th class="border-bottom">{{__('Titre Foncier')}}</th>
                        <th class="border-bottom">{{__('Localisation')}}</th>
                        <th class="border-bottom">{{__('Statut')}}</th>
                        <th class="border-bottom">{{__('Type Opération')}}</th>
                        <th class="border-bottom">{{__('Date création')}}</th>
                        @canany('operation.morcellement.update','operation.morcellement.delete')
                        <th class="border-bottom">{{__('Action')}}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($morcellements as $morcellement)
                    <tr>
                        <td>
                            <a class="text-decoration-underline text-info" href="{{route('portal.operations.details',['operation_id'=>$morcellement->id])}}"><span class="fw-normal">{{$morcellement->numero_operation}}</span></a>
                        </td>

                        <td>
                            <div class='d-flex'>

                            </div>
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <span>
                                    {{__('Numero du titre foncier')}} : <span class="fw-bolder mx-2"> {{$morcellement->titreFoncier->numero_titre_foncier}} </span>
                                </span>
                                <span class="fw-bolder mx-2">
                                    <span class="fw-normal badge super-badge p-2 bg-{{$morcellement->titreFoncier->EtatTFStyle}} round">{{$morcellement->titreFoncier->etat_TF}}</span>
                                </span>
                            </div>
                            {{__('Proprietaire')}}
                            <x-elements.user :options="$morcellement->titreFoncier->users->take(5)" />
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Region')}} : <span class="fw-bolder mx-2"> {{$morcellement->titreFoncier->region->region_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Departement')}} : <span class="fw-bolder mx-2"> {{$morcellement->titreFoncier->division->division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Arrondissement')}} : <span class="fw-bolder mx-2"> {{$morcellement->titreFoncier->subDivision->sub_division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Lieu Dit')}} : <span class="fw-bolder mx-2"> {{$morcellement->titreFoncier->lieu_dit}} </span>
                            </div>
                        </td>
                        <td>
                            <span class="fw-normal badge super-badge p-2 bg-{{$morcellement->typeOperationStyle}} round">{{$morcellement->type_operation_text}}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Statut Geometre')}} : <span class="fw-bolder mx-2">{{$morcellement->statut_geometre}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Statut Notaire')}} : <span class="fw-bolder mx-2"> {{$morcellement->statut_notaire}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Statut Conservateur')}}: <span class="fw-bolder mx-2"> {{$morcellement->statut_conservateur}}</span>
                            </div>
                        </td>

                        <td>
                            <span class="fw-normal">{{$morcellement->created_at->format('Y-m-d')}}</span>
                        </td>
                        @canany('operation.morcellement.update','operation.morcellement.delete')
                        <td>
                            @can('operation.add_coordinates')
                            @livewire('portal.operations.partials.add-coordinates', ['operation_id' => $morcellement->id,'operation_type'=>$morcellement->type_operation ], key($morcellement->id))
                            @endcan

                            @can('operation.add_sale')
                            @if($morcellement->type_operation === 'morcellement_normale')
                            @livewire('portal.operations.partials.add-sales-data', ['operation_id' => $morcellement->id,'operation_type'=>$morcellement->type_operation ], key($morcellement->id))
                            @endif
                            @endcan

                            @can('operation.add_payment')
                            @livewire('portal.operations.partials.add-payment-data', ['operation_id' => $morcellement->id,'operation_type'=>$morcellement->type_operation ], key($morcellement->id))
                            @endcan

                            @can('operation.generate_ba')
                            @livewire('portal.operations.partials.generate-ba', ['operation_id' => $morcellement->id,'operation_type'=>$morcellement->type_operation ], key($morcellement->id))
                            @endcan
                            @can('operation.morcellement.delete')
                            <a href="#" wire:click.prevent="initData({{$morcellement->id}})" data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#" draggable="false">
                                <svg class="icon icon-sm text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
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
                                <h4 class="fs-4 fw-bold">{{__('Liste vide')}}</h4>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{__('Montrer')}} {{$perPage > $morcellements_count ? $morcellements_count : $perPage  }} {{__('éléments sur')}} {{$morcellements_count}}
                </div>
                {{ $morcellements->links() }}
            </div>
        </div>
    </div>
</div>