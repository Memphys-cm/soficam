<div>
    <x-alert />
    @include('livewire.portal.regions.create-update-region')
    @include('livewire.portal.regions.import-regions')
    <x-delete-modal />
    <div class='pb-0'>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-0 align-items-center">
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
                        <li class="breadcrumb-item active">{{ __('Regions') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                    </svg>
                    {{__('Regions Management')}}
                </h1>
                <p class="mt-n2">{{__('Manage regions and their related details')}} &#128524;</p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('region.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateUpdateRegionModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('New')}}
                </a>
                @endcan
                @can('region.import')
                <a href="#" data-bs-toggle="modal" data-bs-target="#importRegionsModal" class="btn btn-sm btn-secondary py-2 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>{{__('Import')}}
                </a>
                @endcan
                @can('region.export_n_print')
                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center {{count($regions) > 0 ? '' :'disabled'}}">
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
        <div class=' pb-4'>
            <div class="row">
                <div class="col-md-4">
                    <label for="search">{{__('Search')}}: </label>
                    <input wire:model="query" id="search" type="text" placeholder="{{__('Search...')}}" class="form-control">
                    <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
                </div>
                <div class="col-md-3">
                    <label for="orderBy">{{__('Order By')}}: </label>
                    <select wire:model="orderBy" id="orderBy" class="form-select">
                        <option value="name">{{__('Name')}}</option>
                        <option value="code">{{__('Code')}}</option>
                        <option value="sector">{{__('Sector')}}</option>
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

                <div class="col-md-2">
                    <label for="perPage">{{__('Per Page')}}: </label>
                    <select wire:model="perPage" id="perPage" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class='row row-cols-1 row-cols-md-2 @if(count($regions) >= 0) row-cols-xl-12 @else row-cols-xl-3 @endif  g-4'>
        @forelse ($regions as $region)
        <div class='col-md-4'>
            <div class="card border-0 shadow pb-4 pt-3 px-3 " draggable="false">
                <div class='d-flex justify-content-between align-items-start'>
                    <div class="card-header border-0 p-0 mb-2 d-flex justify-content-start align-items-start">
                        <div class="d-flex justify-content-start align-items-start">
                            <div class="avatar p-4 d-flex align-items-center justify-content-center fw-bold fs-5 rounded bg-primary me-3"><span class="text-gray-50">{{initials($region->region_name)}}</span></div>
                            <div>
                                <h3 class="h6 mb-0">{{$region->region_name}} ({{$region->code}})</h3>
                                <p class="text-xs fw-lighter"> {{numberFormat(count($region->divisions))}} {{__('Divisions')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="small pt-0 d-flex align-items-end justify-content-end">
                        {{$region->created_at->ISOformat('LL')}}
                    </div>
                </div>
                <hr class="m-0 p-0 mb-3 text-light">
                <div class='d-flex align-items-center justify-content-between'>
                    <div>
                        <a href="{{route('portal.divisions.index')}}" class="btn btn-sm btn-outline-primary py-2 d-inline-flex align-items-center ">
                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <div class="d-none d-md-block">{{__('Divisions')}}</div>
                        </a>
                    </div>
                    <div>
                        @can('region.update')
                        <a href="#" wire:click.prevent="initData({{$region->id}})" data-bs-toggle="modal" data-bs-target="#CreateUpdateRegionModal" draggable="false">
                            <svg class="icon icon-sm text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        @endcan
                        @can('region.delete')
                        <a href="#" wire:click.prevent="initData({{$region->id}})" data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#" draggable="false">
                            <svg class="icon icon-sm text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class='col-md-12 '>
            <div class='border-prim rounded p-4 d-flex justify-content-center align-items-center flex-column mx-2'>
                <div class="text-center text-gray-800 mt-4">
                    <img src="{{ asset('/img/illustrations/not_found.svg') }}" class="w-25 ">
                    <h4 class="fs-4 fw-bold my-1">{{__('Opps nothing here')}} &#128540;</h4>
                    <p class="pt-0 mt-n1">{{__('No record found here!')}}</p>
                </div>
                @can('core.region.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateUpdateRegionModal" class="btn btn-sm btn-primary py-2 mt-3 d-inline-flex align-items-center ">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('Add Region')}}
                </a>
                @endcan
            </div>
        </div>
        @endforelse

    </div>
    <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
        <div>
            {{__('Showing')}} {{$perPage > $regions_count ? $regions_count : $perPage  }} {{__('items of')}} {{$regions_count}}
        </div>
        {{ $regions->links() }}
    </div>
</div>