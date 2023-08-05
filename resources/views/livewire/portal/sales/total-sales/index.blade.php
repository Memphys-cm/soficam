<div>
    <x-alert />
    @include('livewire.portal.sales.total-sales.partials.create-total-sale')
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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Simple Sales')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Total Sales Managment')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('View all Total Sales within the application')}} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                {{-- @can('user.create') --}}
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreatetotalsaleModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('New')}}
                </a>
                {{-- @endcan --}}
                {{-- @can('user.import') --}}
                <a href="#" data-bs-toggle="modal" data-bs-target="#importUsersModal" class="btn btn-sm btn-secondary py-2 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>{{__('Import')}}
                </a>
                {{-- @endcan --}}
                {{-- @can('user.export_n_print') --}}
                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center ">
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
                {{-- @endcan --}}
            </div>
        </div>
    </div>
    <x-alert />

    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{__('Search')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Search...')}}" class="form-control">
            {{-- <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p> --}}
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
            </select>
        </div>
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{__('CODE')}}</th>
                        <th class="border-bottom">{{__('PURCHASER(s) NAME')}}</th>
                        <th class="border-bottom">{{__('LAND TITLE NUMBER')}}</th>
                        <th class="border-bottom">{{__('SALE TYPE')}}</th>
                        <th class="border-bottom">{{__('Surface for sale')}}</th>
                        <th class="border-bottom">{{__('Price per m²')}}</th>
                        <th class="border-bottom">{{__('Sale amount')}}</th>
                        <th class="border-bottom">{{__('Amount Advance')}}</th>
                        <th class="border-bottom">{{__('Amount Balance')}}</th>
                        <th class="border-bottom">{{__('Payment Type')}}</th>
                        <th class="border-bottom">{{__('Created By')}}</th>
                        <th class="border-bottom">{{__('Date created')}}</th>
                        {{-- @canany('user.update','user.delete') --}}
                        <th class="border-bottom">{{__('Action')}}</th>
                        {{-- @endcanany --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($totals as $total)
                    <tr>
                        <td>{{ $total->sales_code }}</td>
                        <td>{{ $total->purchaser_name }}</td>
                        <td>{{ $total->user_id }}</td>
                        <td>{{ $total->sale_type }}</td>
                        <td>{{ $total->surface_for_sale }}  {{ __('m²') }}</td>
                        <td>{{ $total->price_per_m² }}  {{ __('XAF') }}</td>
                        <td>{{ $total->sale_amount }}  {{ __('XAF') }}</td>
                        <td>{{ $total->advance }}  {{ __('XAF') }}</td>
                        <td>{{ $total->balance }}  {{ __('XAF') }}</td>
                        <td>{{ $total->payment_type }}</td>
                        <td>{{ $total->created_by }}</td>
                        <td>{{ $total->created_at }}</td>
                        
                        <td>

                            {{-- <a href='#' wire:click.prevent="initData({{$total->id}})" data-bs-toggle="modal" data-bs-target="#Edittotalodal">
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a> --}}
                            
                            <a href='#' wire:click.prevent="initData({{$total->id}})" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                                <svg class="icon icon-xs text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </a>
                        </td>
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
               
                {{ $totals->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#CreatetotalsaleModal').modal('hide');
            $('#DeleteModal').modal('hide');
        });
    </script>
@endpush