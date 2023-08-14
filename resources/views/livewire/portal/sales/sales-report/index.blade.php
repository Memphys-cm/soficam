<div>
    <x-alert />
    <x-delete-modal />
    <div class='p-0'>
        <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">

        </div>

    </div>
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
                        <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Sales') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('All Sales') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('View All Sales') }} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">


                {{-- @can('user.export_n_print') --}}
                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center ">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        {{ __('Export') }}
                    </a>
                </div>
                <div class="text-center mx-2" wire:loading wire:target="export">
                    <div class="text-center">
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                    </div>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
    </div>

    <div class="row p-3">

        <div class="row">
            <div class="col-md-3">
                <label for="search">{{__('Search')}}: </label>
                <input wire:model="query" id="search" type="text" placeholder="{{__('Search...')}}" class="form-control">
                {{-- <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p> --}}
            </div>

            <div class="col-md-3 my-2">
                <label for="sale_type">{{ __('Sales Type') }}: </label>
                <select wire:model="sales_type" id="sales_type" class="form-select">
                    <option value="all">{{ __('All Sales Types') }}</option>
                    <option value="certificate_propriete">{{ __('CertificatePropriete') }}</option>

                </select>
            </div>

            <div class="col-md-3 my-2">
                <label for="payment_status">{{ __('Payment Status') }}: </label>
                <select wire:model="payment_status" id="payment_status" class="form-select">
                    <option value="all">{{ __('All') }}</option>
                    <option value="pending_payment">{{ __('Pending Payment') }}</option>
                    <option value="partially_paid">{{ __('Partially Paid') }}</option>
                    <option value="totally_paid">{{ __('Totally Paid') }}</option>
                </select>
            </div>
            <div class="col-md-3 my-2">
                <label for="service">{{ __('Payment Method') }}: </label>
                <select wire:model="payment_method" id="payment_method" class="form-select">
                    <option value="all">{{ __('All') }}</option>
                    <option value="mtn_mobile_money">{{ __('MTN Mobile Money') }}</option>
                    <option value="orange_money">{{ __('Orange Money') }}</option>
                    <option value="cash">{{ __('Cash') }}</option>
                    <option value="cheque">{{ __('Cheque') }}</option>
                    <option value="bank_transfer">{{ __('Bank Transfer') }}</option>
                </select>
            </div>
            <div class="col-md-3 my-2">
                <label for="startdate">{{ __('Start Period') }}</label>
                <input wire:model="startdate" name="startdate" type="date"
                    class="form-control  @error('inter_start') is-invalid @enderror" required="">
            </div>
            <div class='col-md-3 my-2'>
                <label for="enddate">{{ __('End Date') }}</label>
                <input wire:model="enddate" name="enddate" type="date"
                    class="form-control @error('enddate') is-invalid @enderror" required="">
            </div>
            <div class="col-md-3">
                <label for="service">{{ __('Service') }}</label>
                <x-input.select wire:model="service_id" prettyname="service_id" :options="$services->pluck('service_name_fr', 'id')->toArray()"
                    selected="('service')" />
                @error('service')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class='col'>
                <label class="px-2" for="receveur">{{ __('Receveur') }}</label>
                <x-input.select wire:model="receveur_id" prettyname="receveur_id" :options="$receveurs->pluck('first_name', 'id')->toArray()" />
                @error('user_ids')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
    <div class="row p-3">

        <div class="row">
            <div class="col-md-3">
                <label for="orderBy">{{ __('Sort By') }}: </label>
                <select wire:model="orderBy" id="orderBy" class="form-select">
                    <option value="requestor_id">{{ __('Requestor') }}</option>
                    <option value="sales_type">{{ __('Sales type') }}</option>
                    <option value="sales_total_amount">{{ __('Amount.') }}</option>
                    <option value="user_id">{{ __('User') }}</option>
                    <option value="payment_method">{{ __('Payment Method') }}</option>
                    <option value="payment_status">{{ __('Payment Status') }}</option>
                    <option value="created_at" selected>{{ __('Created Date') }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="direction">{{ __('Order direction') }}: </label>
                <select wire:model="orderAsc" id="direction" class="form-select">
                    <option value="asc">{{ __('Ascending') }}</option>
                    <option value="desc">{{ __('Descending') }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="perPage">{{ __('Items Per Page') }}: </label>
                <select wire:model="perPage" id="perPage" class="form-select">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="notary">{{ __('NOTARY') }}</label>
                <x-input.select wire:model="notary" prettyname="notary" :options="$notaries->pluck('name', 'id')->toArray()" selected="('notary')" />
                @error('notary')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('Code') }}</th>
                        <th class="border-bottom">{{ __('User NAME') }}</th>
                        <th class="border-bottom">{{ __('Sale Amount') }}</th>
                        <th class="border-bottom">{{ __('Service Name') }}</th>
                        <th class="border-bottom">{{ __('Payment Method') }}</th>
                        <th class="border-bottom">{{ __('Payment Status') }}</th>
                        <th class="border-bottom">{{ __('Date created') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($allsales as $allsale)
                            <tr>
                                <td><span class="fw-normal">{{ $allsale->sales_code }}</span></td>
                                <td><span class="fw-normal">{{ $allsale->user_id }}</span></td>
                                <td><span class="fw-normal">{{ $allsale->sales_amount }}</span></td>
                                <td><span class="fw-normal">{{ $allsale->commentaires }}</span></td>
                                <td><span class="fw-normal">{{ $allsale->payment_method }}</span></td>
                                <td><span class="fw-normal">{{ $allsale->payment_status }}</span></td>
                                <td><span class="fw-normal">{{ $allsale->created_at->format('Y-m-d') }}</span></td>
                            </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">
                                <div class="text-center text-gray-800 mt-2">
                                    <h4 class="fs-4 fw-bold">{{ __('Opps nothing here') }} &#128540;</h4>
                                    <p>{{ __('No Record Found..!') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{ __('Showing') }} {{ $perPage > $allsales_count ? $allsales_count : $perPage }}
                    {{ __('items of') }} {{ $allsales_count }}
                </div>
                {{ $allsales->links() }}
            </div>
        </div>
    </div>
</div>
