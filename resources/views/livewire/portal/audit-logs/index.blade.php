<div>
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
                        <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Journal de connexion')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Journal de connexion')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('Visualiser toutes les activités réalisées dans votre espace')}} </p>
            </div>
            <div class="mb-2 mx-3">

            </div>
        </div>
    </div>
    <div class='mb-3 mt-0'>
        <div class='row'>
            <div class="col-12 col-sm-6 col-xl-3 mb-2">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-4 text-xl-center mb-2 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-tertiary rounded me-2 me-sm-0">
                                    <svg class="icon icon-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5">{{__('Total des journaux de connexion')}}</h2>
                                    <h3 class="mb-1">{{numberFormat(count($logs))}}</h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 px-xl-0">
                                <a href="" class="d-none d-sm-block">
                                    <h2 class="h5">{{__('Total des journaux de connexion')}}</h2>
                                    <h3 class="fw-extrabold mb-1">{{numberFormat(count($logs))}}</h3>
                                </a>
                                <div class="small d-flex mt-1">
                                    <div>{{ \Str::plural(__('Journaux de connexion'), count($logs)) }} {{__('Enregistrés')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3 mb-2">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-4 text-xl-center mb-2 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-success rounded me-2 me-sm-0">
                                    <svg class="icon icon-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5">{{ \Str::plural(__('Journaux de création'), $creation_log_count) }}</h2>
                                    <h3 class="mb-1">{{numberFormat($creation_log_count)}}</h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 px-xl-0">
                                <a href="" class="d-none d-sm-block">
                                    <h2 class="h5">{{ \Str::plural(__('Journaux de création'), $creation_log_count) }}</h2>
                                    <h3 class="fw-extrabold mb-1">{{numberFormat($creation_log_count)}}</h3>
                                </a>
                                <div class="small d-flex mt-1">
                                    <div>{{ \Str::plural(__('Journaux de création'), $creation_log_count) }} {{__('Enregistrés')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3 mb-2">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-4 text-xl-center mb-2 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-warning rounded me-2 me-sm-0">
                                    <svg class="icon icon-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5">{{ \Str::plural(__('Journal des mises à jour'), $update_log_count) }}</h2>
                                    <h3 class="mb-1">{{numberFormat($update_log_count)}}</h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 px-xl-0">
                                <a href="" class="d-none d-sm-block">
                                    <h2 class="h5">{{ \Str::plural(__('Journal des mises à jour'), $update_log_count) }}</h2>
                                    <h3 class="fw-extrabold mb-1">{{numberFormat($update_log_count)}}</h3>
                                </a>
                                <div class="small d-flex mt-1">
                                    <div>{{ \Str::plural(__('Journaux des mises à jour'), $update_log_count) }} {{__('Enregistrés')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3 mb-2">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-4 text-xl-center mb-2 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-danger rounded me-2 me-sm-0">
                                    <svg class="icon icon-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5">{{ \Str::plural(__('Journal des suppressions'), $deletion_log_count) }}</h2>
                                    <h3 class="mb-1">{{numberFormat($deletion_log_count)}} </h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 px-xl-0">
                                <a href="" class="d-none d-sm-block">
                                    <h2 class="h5">{{ \Str::plural(__('Journal des suppressions'), $deletion_log_count) }}</h2>
                                    <h3 class="fw-extrabold mb-1">{{numberFormat($deletion_log_count)}} </h3>
                                </a>
                                <div class="small d-flex mt-1">
                                    <div>{{ \Str::plural(__('Journaux des suppressions'), $deletion_log_count) }} {{__('Enregistrés!')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-alert />

    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{__('Recherche')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{__('Trier par')}}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="user">{{__('Utilisateur')}}</option>
                <option value="action_type">{{__('Type d\'action')}}</option>
                <option value="created_at">{{__('Date de création')}}</option>
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
            <label for="perPage">{{__('Elément par page')}}: </label>
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
                        <th class="border-bottom">{{__('Employé(s)')}}</th>
                        <th class="border-bottom">{{__('Type d\'action')}}</th>
                        <th class="border-bottom">{{__('Action réalisée')}}</th>
                        <th class="border-bottom">{{__('Date de création')}}</th>
                        @can('audit_log.delete')
                        <th class="border-bottom">{{__('Action')}}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>
                            <a href="#" class="d-flex align-items-center">
                                <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-secondary me-3"><span class="text-white">{{initials($log->user)}}</span></div>
                                <div class="d-block"><span class="fw-bold">{{$log->user}}</span>
                                    <div class="small text-gray">{{$log->user}}</div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="fw-normal badge super-badge badge p-2 bg-{{$log->style}} rounded">{{$log->action_type}}</span>
                        </td>
                        <td>
                            <span class="fs-normal">{!! $log->action_perform !!}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{$log->created_at->format('Y-m-d')}}</span>
                        </td>
                        @can('audit_log.delete')
                        <td>
                            <a href="#" wire:click.prevent="initData({{$log->id}})" data-bs-toggle="modal" data-bs-target="#DeleteModal" href="#" draggable="false">
                                <svg class="icon icon-sm text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </td>
                        @endcan
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="text-center text-gray-800 mt-2">
                                <h4 class="fs-4 fw-bold">{{__('Liste Vide')}} </h4>
                                <p>{{__('Aucun enregistrement trouvé..!')}}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{__('Montrer')}} {{$perPage > count($logs) ? count($logs) : $perPage  }} {{__('éléments sur ')}} {{count($logs)}}
                </div>
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</div>