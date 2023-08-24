<div>
    <x-alert />
    @include('livewire.portal.releve-immobilier.bien-immobilier.partials.create')
    @include('livewire.portal.releve-immobilier.bien-immobilier.partials.edit')
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
                        <li class="breadcrumb-item"><a href="/">{{__('Tableau de Bord')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Biens immobiliers')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Biens immobiliers')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('Voir tous les biens immobiliers')}} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateEstateModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('Nouveau')}}
                </a>
                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center ">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        {{ __('Exporter') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{__('Recherche')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Trier par')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="action_type">{{__(' Type Statut')}}</option>
                <option value="created_at">{{__('Date Creation ')}}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{__('Trier par direction')}}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{__('Ascendante')}}</option>
                <option value="desc">{{__('Descendante')}}</option>
            </select>
        </div>

        <div class="col-md-3">
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
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{__('Numéro de l\'immobilier')}}</th>
                        <th class="border-bottom">{{__('Requerant')}}</th>
                        <th class="border-bottom">{{__('Prix')}}</th>
                        <th class="border-bottom">{{__('Validité')}}</th>
                        <th class="border-bottom">{{__('Type de bien immobilier')}}</th>
                        <th class="border-bottom">{{__('Statut')}}</th>
                        <th class="border-bottom">{{__('Creer par')}}</th>
                        <th class="border-bottom">{{__('Date creation')}}</th>
                        <th class="border-bottom">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($real_estates as $real_estate)
                    <tr>
                        <td>
                            <span class="fs-normal">{{$real_estate->releve_number }}</span>
                        </td>
                            
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3"><span class="text-white">{{initials($real_estate->requestor->first_name)}}</span></div>
                                <div class="d-block"><span class="fw-bold">{{$real_estate->requestor->first_name}}</span>
                                    <div class="small text-gray">{{!empty($real_estate->requestor->first_name) ? $real_estate->requestor->first_name : ''}}</div>
                                </div> 
                            </div>
                        </td>

                        <td>
                            <span class="fs-normal">{{$real_estate->price }} {{__('XAF')}}</span>
                        </td>

                        <td>
                            <span class="fs-normal">{{$real_estate->validity}}</span>
                        </td>

                        <td>
                            <span class="fs-normal">{{$real_estate->releves_type }}</span>
                        </td>

                        <td>
                            <span class="fw-normal  badge super-badge p-2  bg-{{$real_estate->status_style}} rounded">{{$real_estate->status}}</span>
                        </td>

                        <td>
                            <span class="fs-normal">{{$real_estate->recorded_by}}</span>
                        </td>
                        
                        <td>
                            <span class="fw-normal">{{$real_estate->created_at->format('Y-m-d')}}</span>
                        </td>

                        <td>
                            <a href="#" wire:click.prevent="initData({{ $real_estate->id }})" data-bs-toggle="modal" data-bs-target="#EditEstateModal">
                                <svg class="icon icon-sm text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <a href="#" wire:click.prevent="initData({{ $real_estate->id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#" draggable="false">
                                <svg class="icon icon-sm text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
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
                    {{__('Afficher ')}} {{$perPage > $real_estates_count ? $real_estates_count : $perPage  }} {{__('element de')}} {{$real_estates_count}}
                </div>
                {{ $real_estates->links() }}
            </div>
        </div>
    </div>
</div>