<div>
    @include('livewire.user.paiement.pay')
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
                        <li class="breadcrumb-item"><a href="/">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('PAIEMENTS') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Paiements') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Listes de tous vos paiements') }}  </p>
            </div>
        </div>
    </div>
    <x-alert />

    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{ __('Rechercher') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Rechercher...') }}"
                class="form-control">
            {{-- <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p> --}}
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{ __('Trier par') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="sale_amount">{{ __('Prix') }}</option>
                <option value="sale_type">{{ __('Type vente') }}</option>
                <option value="created_at">{{ __('Date création') }}</option>
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
            <label for="perPage">{{ __('Éléments par Page') }}: </label>
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
                        <th class="border-bottom">{{ __('REQUÉRANT') }}</th>
                        <th class="border-bottom">{{ __('MÉTHODE DE PAIEMENT') }}</th>
                        <th class="border-bottom">{{ __('TYPE VENTE') }}</th>
                        <th class="border-bottom">{{ __('PRIX') }}</th>
                        <th class="border-bottom">{{ __('StatuT PAIMENT') }}</th>
                        <th class="border-bottom">{{ __('CRÉÉ PAR') }}</th>
                        <th class="border-bottom">{{ __('Date création') }}</th>
                        <th class="border-bottom">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($allsaless as $allsale)
                        <tr>
                            <td>
                                @if ($allsale->user)
                                    <a href="#" class="d-flex align-items-center">
                                        <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3">
                                            <span class="text-white">{{ initials($allsale->user->first_name) }}</span>
                                        </div>
                                        <div class="d-block">
                                            <span class="fw-bold">{{ $allsale->user->first_name }}</span>
                                        </div>
                                    </a>
                                @else
                                    User not found
                                @endif
                            </td>
                            
                            <td>{{ $allsale->payment_method }}</td>
                            <td>{{ $allsale->sales_type }}</td>
                            <td>{{ $allsale->sales_amount }} {{ __('XAF') }}</td>
                            <td>

                                <span
                                    class="fw-normal badge super-badge p-2 bg-{{ $allsale->statusStyle }} round">{{ $allsale->payment_status }}</span>

                            </td>
                            <td>{{ $allsale->created_by }}</td>
                            <td>{{ $allsale->created_at }}</td>

                            <td>
                                <a href='#' wire:click.prevent="" data-bs-toggle="modal" data-bs-target="#PayModal">
                                    <svg class="icon icon-xs" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" d="M18.665,4.784H1.335c-0.479,0-0.866,0.388-0.866,0.866v8.665c0,0.479,0.388,0.866,0.866,0.866h17.33c0.479,0,0.866-0.388,0.866-0.866V5.65C19.531,5.172,19.144,4.784,18.665,4.784 M1.769,5.65c0.239,0,0.433,0.194,0.433,0.434S2.008,6.517,1.769,6.517c-0.24,0-0.434-0.193-0.434-0.433S1.529,5.65,1.769,5.65 M1.769,14.315c-0.24,0-0.434-0.194-0.434-0.434s0.194-0.433,0.434-0.433c0.239,0,0.433,0.193,0.433,0.433S2.008,14.315,1.769,14.315 M18.231,14.315c-0.239,0-0.433-0.194-0.433-0.434s0.193-0.433,0.433-0.433c0.24,0,0.434,0.193,0.434,0.433S18.472,14.315,18.231,14.315M18.665,12.662c-0.136-0.049-0.281-0.08-0.434-0.08c-0.718,0-1.3,0.583-1.3,1.3c0,0.152,0.031,0.298,0.08,0.434H2.989c0.048-0.136,0.08-0.281,0.08-0.434c0-0.717-0.583-1.3-1.3-1.3c-0.153,0-0.297,0.031-0.434,0.08V7.304c0.136,0.048,0.281,0.079,0.434,0.079c0.717,0,1.3-0.582,1.3-1.299c0-0.153-0.032-0.297-0.08-0.434h14.023c-0.049,0.136-0.08,0.281-0.08,0.434c0,0.718,0.582,1.299,1.3,1.299c0.152,0,0.298-0.031,0.434-0.079V12.662z M18.231,6.517c-0.239,0-0.433-0.193-0.433-0.433s0.193-0.434,0.433-0.434c0.24,0,0.434,0.194,0.434,0.434S18.472,6.517,18.231,6.517 M5.235,6.517H4.368c-0.24,0-0.433,0.194-0.433,0.433c0,0.24,0.193,0.433,0.433,0.433h0.867c0.239,0,0.433-0.193,0.433-0.433C5.668,6.711,5.474,6.517,5.235,6.517 M15.632,12.582h-0.866c-0.239,0-0.433,0.194-0.433,0.434s0.193,0.434,0.433,0.434h0.866c0.239,0,0.434-0.194,0.434-0.434S15.871,12.582,15.632,12.582 M10,6.517c-1.914,0-3.465,1.552-3.465,3.466c0,1.915,1.552,3.466,3.465,3.466c1.914,0,3.467-1.552,3.467-3.466C13.467,8.069,11.914,6.517,10,6.517 M11.795,9.474c-0.059,0.4-0.279,0.593-0.571,0.661c0.401,0.21,0.606,0.534,0.411,1.093c-0.241,0.694-0.815,0.753-1.579,0.607l-0.185,0.747L9.423,12.47l0.183-0.737c-0.116-0.028-0.234-0.06-0.356-0.093l-0.184,0.74l-0.447-0.111l0.185-0.749c-0.104-0.027-0.211-0.056-0.319-0.083l-0.582-0.146l0.222-0.516c0,0,0.33,0.088,0.325,0.082c0.127,0.032,0.183-0.051,0.205-0.107l0.292-1.18C8.964,9.573,8.98,9.578,8.995,9.581C8.978,9.573,8.961,9.569,8.949,9.566l0.208-0.842C9.163,8.627,9.13,8.507,8.949,8.461c0.006-0.004-0.325-0.082-0.325-0.082l0.119-0.48L9.36,8.054v0.002c0.092,0.023,0.188,0.045,0.285,0.067l0.184-0.74l0.447,0.113l-0.18,0.725c0.121,0.027,0.241,0.056,0.359,0.085l0.177-0.721l0.449,0.112l-0.184,0.74C11.464,8.634,11.876,8.928,11.795,9.474 M9.976,8.753L9.753,9.652c0.252,0.064,1.032,0.322,1.158-0.187C11.042,8.935,10.229,8.816,9.976,8.753 M9.641,10.106l-0.246,0.991c0.303,0.076,1.239,0.378,1.377-0.181C10.917,10.333,9.944,10.183,9.641,10.106"></path>
                                    </svg> {{__('payé')}}                                                          
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                <div class="text-center text-gray-800 mt-2">
                                    <h4 class="fs-4 fw-bold">{{ __('Liste Vide') }} </h4>
                                    <p>{{ __('No Record Found..!') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{ __('Montrer') }} {{ $perPage > $allsales_count ? $allsales_count : $perPage }}
                    {{ __(' éléments sur ') }} {{ $allsales_count }}
                </div>
                {{ $allsaless->links() }}
            </div>
        </div>
    </div>
</div>
