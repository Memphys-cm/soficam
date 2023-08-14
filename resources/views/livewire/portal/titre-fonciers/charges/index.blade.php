<div>
    <x-alert />
    @include('livewire.portal.titre-fonciers.charges.partials.create')
    <x-delete-modal />
    <div class='p-0'>
        <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
            <div class="mb-lg-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Land Titles Chrages') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Attribute a charge to a Land Title') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('View all charges on Land Title') }} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateChargeModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{ __('New') }}
                </a>

                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center ">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
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
            </div>
        </div>
    </div>

    <x-alert />

    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{ __('Search') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Search...') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{ __('Order By') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="created_at">{{ __('Created Date') }}</option>
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
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('LAND TITLE') }}</th>
                        <th class="border-bottom">{{ __('PROPRIATORS') }}</th>
                        <th class="border-bottom">{{ __('CHARGE') }}</th>
                        <th class="border-bottom">{{ __('STATUS') }}</th>
                        <th class="border-bottom">{{ __('Date created') }}</th>
                        <th class="border-bottom">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($certificateproprietes as $certificatepropriete)
                    <tr>
                        <td>
                            <a href="#" class="d-flex align-items-center">
                                <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3"><span class="text-white">{{initials($certificatepropriete->purchaser_name )}}</span></div>
                                <div class="d-block"><span class="fw-bold">{{$certificatepropriete->requestor_id }}</span>
                                    <div class="small text-gray">{{!empty($certificatepropriete->purchaser_name ) ? $certificatepropriete->purchaser_name  : ''}}</div>
                                </div>
                            </a>
                        </td>
                        <td>{{ !empty($certificatepropriete->titreFoncier) ? $certificatepropriete->titreFoncier->numero_titre_foncier : '' }}</td>
                        <td>{{ $certificatepropriete->certificate_proprietes_number }}</td>

                        <td>{{ $certificatepropriete->price }}</td>
                        <td>{{ $certificatepropriete->validity }}</td>
                        <td>{{ $certificatepropriete->certificate_proprietes_type }}</td>

                        <td>
                            {{-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $this->getStatusClass($certificatepropriete->status) }}">
                            {{ ucfirst($certificatepropriete->status) }}
                            </span> --}}
                            <span class="fw-normal badge super-badge p-2 bg-{{$certificatepropriete->statusStyle}} round">{{$certificatepropriete->status}}</span>

                        </td>
                        <td>{{ $certificatepropriete->created_at }}</td>
                        @canany(['certificate_propriete.edit','certificate_propriete.delete'])
                        <td>
                            @can('certificate_propriete.update')
                            <a href='#' wire:click.prevent="initData({{ $certificatepropriete -> id }})" data-bs-toggle="modal" data-bs-target="#UpdateCertificateProprieteModal">
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>

                            @endcan
                            @can('certificate_propriete.delete')
                            <a href='#' wire:click.prevent="initData({{ $certificatepropriete -> id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                                <svg class="icon icon-xs text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                            @endcan
                        </td>
                        @endcanany
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">
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
                    {{__('Showing')}} {{$perPage > $certificateproprietes_count ? $certificateproprietes_count : $perPage  }} {{__('items of')}} {{$certificateproprietes_count}}
                </div>
                {{ $certificateproprietes->links()  }}
            </div>
        </div>
    </div>
</div>