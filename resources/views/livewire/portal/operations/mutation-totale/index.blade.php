<div>
    <x-alert />
    @include('livewire.portal.operations.mutation-totale.partials.create-form')
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
                        <li class="breadcrumb-item"><a href="/">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item">{{__('Operations')}}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Mutation Totale')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Mutation Totale')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('View all Mutation Totale')}} </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('mutation_totale.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateMutationTotaleNormaleModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('New')}}
                </a>
                @endcan
                @can('mutation_totale.create')
                @livewire('portal.operations.mutation-totale.partials.create-par-deces-form')
                @endcan
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{__('Search')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Search...')}}" class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Order By')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{__('Region')}}</option>
                <option value="date_de_delivrance_du_TF">{{__('Delivery Date')}}</option>
                <option value="created_at">{{__('Created Date')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{__('Order direction')}}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{__('Ascending')}}</option>
                <option value="desc">{{__('Descending')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="perPage">{{__('Items Per Page')}}: </label>
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
                        <th class="border-bottom">{{__('Mutation Totale Number')}}</th>
                        <th class="border-bottom">{{__('Land title')}}</th>
                        <th class="border-bottom">{{__('Location')}}</th>
                        <th class="border-bottom">{{__('Status')}}</th>
                        <th class="border-bottom">{{__('Type Operation')}}</th>
                        <th class="border-bottom">{{__('Date created')}}</th>
                        @canany('mutation_totale.update','mutation_totale.delete')
                        <th class="border-bottom">{{__('Action')}}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($mutation_totales as $mutation_totale)
                    <tr>
                        <td>
                            <span class="fw-normal">{{$mutation_totale->numero_operation}}</span>
                        </td>
                        <td>
                            <div class='d-flex'>

                            </div>
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <span>
                                    {{__('Land Title Number')}} : <span class="fw-bolder mx-2"> {{$mutation_totale->titreFoncier->numero_titre_foncier}} </span>
                                </span>
                                <span class="fw-bolder mx-2">
                                    <span class="fw-normal badge super-badge p-2 bg-{{$mutation_totale->titreFoncier->EtatTFStyle}} round">{{$mutation_totale->titreFoncier->etat_TF}}</span>
                                </span>
                            </div>
                            {{__('Owners')}}
                            <x-elements.user :options="$mutation_totale->titreFoncier->users->take(5)" />
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Region')}} : <span class="fw-bolder mx-2"> {{$mutation_totale->titreFoncier->region->region_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Division')}} : <span class="fw-bolder mx-2"> {{$mutation_totale->titreFoncier->division->division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Sub Divi')}} : <span class="fw-bolder mx-2"> {{$mutation_totale->titreFoncier->subDivision->sub_division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Lieu Dit')}} : <span class="fw-bolder mx-2"> {{$mutation_totale->titreFoncier->lieu_dit}} </span>
                            </div>
                        </td>
                        <td>
                            <span class="fw-normal badge super-badge p-2 bg-{{$mutation_totale->typeOperationStyle}} round">{{$mutation_totale->type_operation_text}}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Statut Geometre')}} : <span class="fw-bolder mx-2">{{$mutation_totale->statut_geometre}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Statut Notaire')}} : <span class="fw-bolder mx-2"> {{$mutation_totale->statut_notaire}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Statut Conservateur')}}: <span class="fw-bolder mx-2"> {{$mutation_totale->statut_conservateur}}</span>
                            </div>
                        </td>

                        <td>
                            <span class="fw-normal">{{$mutation_totale->created_at->format('Y-m-d')}}</span>
                        </td>
                        @canany('mutation_totale.update','mutation_totale.delete')
                        <td class="">

                            <div class='d-flex align-items-center justify-content-center'>

                                @can('mutation_totale.update')

                                @livewire('portal.operations.partials.add-coordinates', ['operation_id' => $mutation_totale->id,'operation_type'=>'mutation_totale' ], key($mutation_totale->id))
                                @livewire('portal.operations.partials.add-sales-data', ['operation_id' => $mutation_totale->id,'operation_type'=>'mutation_totale' ], key($mutation_totale->id))
                                @livewire('portal.operations.partials.add-payment-data', ['operation_id' => $mutation_totale->id,'operation_type'=>'mutation_totale' ], key($mutation_totale->id))

                                <a href="{{route('portal.operations.detail-mut',['operation_id'=>$mutation_totale->id])}}">
                                    <svg class="icon icon-sm text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>
                                </a>

                                <a title=" {{__('Generate Bordereau Analytique')}}" wire:click.prevent="initData({{$mutation_totale->id}})" data-bs-toggle="modal" data-bs-target="#" draggable="false" href="#">
                                    <svg class="icon icon-sm text-primary me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                                    </svg>
                                </a>

                                @endcan
                                @can('mutation_totale.delete')
                                <a href="#" wire:click.prevent="initData({{$mutation_totale->id}})" data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#" draggable="false">
                                    <svg class="icon icon-sm text-danger me-2 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                @endcan
                            </div>
                        </td>
                        @endcanany
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">
                            <div class="text-center text-gray-800 mt-2">
                                <h4 class="fs-4 fw-bold">{{__('Opps nothing here')}} &#128540;</h4>
                                <p>{{__('No Record Found..!')}}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{__('Showing')}} {{$perPage > $mutation_totales_count ? $mutation_totales_count : $perPage  }} {{__('items of')}} {{$mutation_totales_count}}
                </div>
                {{ $mutation_totales->links() }}
            </div>
        </div>
    </div>
</div>