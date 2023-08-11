<div>
    <x-alert />
    @include('livewire.portal.lotissement.create-housing_estate')
    @include('livewire.portal.lotissement.view-housing_estate')
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
                        <li class="breadcrumb-item active" aria-current="page">{{__('housing_estates')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('housing_estates')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('View all housing_estates')}} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('etat_cession.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateUpdateHousingEstateModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('New')}}
                </a>
                @endcan
                @can('etat_cession.import')
                <a href="#" data-bs-toggle="modal" data-bs-target="#importhousing_estatesModal" class="btn btn-sm btn-secondary py-2 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>{{__('Import')}}
                </a>
                @endcan
                @can('etat_cession.export_n_print')
                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center {
                        {{-- {count($housing_estates) > 0 ? '' :'disabled'}} --}}
                        ">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        {{__('Export')}}
                    </a>
                </div>
                <div class="text-center mx-2" wire:loading wire:target="export">
                    <div class="text-center">
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{__('Search')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Search...')}}" class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Order By')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="user">{{__('User')}}</option>
                <option value="action_type">{{__('Action Type')}}</option>
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
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{__('Code')}}</th>
                        <th class="border-bottom">{{__('Land title Number')}}</th>
                        <th class="border-bottom">{{__('Region')}}</th>
                        <th class="border-bottom">{{__('Area Sold')}}</th>
                        <th class="border-bottom">{{__('Remaining Area')}}</th>
                        <th class="border-bottom">{{__('Real Estate Developer')}}</th>
                        <th class="border-bottom">{{__('Date created')}}</th>
                        @canany('etat_cession.update','etat_cession.delete')
                        <th class="border-bottom">{{__('Action')}}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($housing_estates as $housing_estate)
                    <tr>
                        <td>
                            <span class="fw-normal">{{$housing_estate->code}}</span>
                        </td>
                        <td>
                            {{-- <a href="#" class="d-flex align-items-center">
                                <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3"><span class="text-white">{{initials($housing_estate->housing_estate_name)}}</span></div>
                                <div class="d-block"><span class="fw-bold">{{$housing_estate->housing_estate_name}}</span>
                                    <div class="small text-gray">{{!empty($housing_estate->housing_estate_name) ? $housing_estate->housing_estate_name : ''}}</div>
                                </div>
                            </a> --}}
                        </td>
                        <td class="text-center">
                            {{-- <span class="fw-normal">{{ $housing_estate->users_count }}</span> --}}
                        </td>
                        <td>
                            {{-- <span class="fw-normal badge super-badge p-2 bg-{{$housing_estate->statusStyle}} round">{{$housing_estate->statusText}}</span> --}}
                        </td>
                        <td class="text-center">
                            <span class="fw-normal"></span>
                        </td>
                        <td class="text-center"> {{ $housing_estate->estate_agent }} </td>
                        <td>
                            <span class="fw-normal">{{$housing_estate->created_at->format('Y-m-d')}}</span>
                        </td>
                        @canany('etat_cession.update','etat_cession.delete')
                        <td>
                            @can('etat_cession.update')
                            <a href="#" wire:click.prevent="initData({{$housing_estate->id}})" data-bs-toggle="modal" data-bs-target="#ViewHousingEstateModal" draggable="false">
                                <svg class="icon icon-sm text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  </svg>
                                  
                            </a>
                            <a href="#" wire:click.prevent="initData({{$housing_estate->id}})" data-bs-toggle="modal" data-bs-target="#CreateUpdateHousingEstateModal" draggable="false">
                                <svg class="icon icon-sm text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            @endcan
                            @can('etat_cession.delete')
                            <a href="#" wire:click.prevent="initData({{$housing_estate->id}})" data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#" draggable="false">
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
                        <td colspan="7" class="text-center">
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
                    {{__('Showing')}} {{$perPage > $housing_estates_count ? $housing_estates_count : $perPage  }} {{__('items of')}} {{$housing_estates_count}}
                </div>
                {{ $housing_estates->links() }}
            </div>
        </div>
    </div>
</div>