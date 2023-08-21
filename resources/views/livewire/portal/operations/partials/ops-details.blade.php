<div>
    <x-alert />
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
                        <li class="breadcrumb-item"><a href="/">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item "><a href="">{{__('Operations')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Details')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3 '>
            <div class="card p-3 mb-3">
                <h5 class="w-auto">{{ __('Details of Operation') }}</h5>
                <ul class="">
                    <li class="">No.{{ $operation->numero_operation }}</li>
                    <li class="">{{ $operation->updated_at }}</li>
                    <li class="">
                        <span class="fw-normal badge super-badge p-2 bg-{{$operation->typeOperationStyle}} round">{{$operation->type_operation_text}}</span>
                    </li>
                </ul>
            </div>
            <div class="card p-3 mb-3">
                <h5 class="w-auto">{{ __('Documents') }}</h5>
                @if(!empty($medias))
                <table>
                    <thead class="fw-light">
                        <th class="fw-light">{{__('File Name')}}</th>
                        <th class="fw-light">{{__('Size')}}</th>
                    </thead>
                    <tbody>
                        @foreach($medias as $key => $media)
                        <tr>
                            <td>
                                <a wire:click.prevent="fileViewer({{$media->id}})" target="_blank"> {{$media->name}} </a>
                            </td>
                            <td>
                                {{$media->human_readable_size}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <div class="card border-0 shadow">
                <div class="card-header d-flex align-items-center">
                    <h2 class="fs-5 fw-bold mb-0">{{__('Flow Stage')}}</h2>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush list-group-timeline">
                        <div class="list-group-item border-0">
                            <div class="row ps-lg-1">
                                <div class="col-auto">
                                    <div class="icon-shape icon-xs icon-shape-purple rounded">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col ms-n2 mb-3">
                                    <h3 class="fs-6 fw-bold mb-1">{{__('Geometre Activity')}}</h3>
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="small">1 minute ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0">
                            <div class="row ps-lg-1">
                                <div class="col-auto">
                                    <div class="icon-shape icon-xs icon-shape-primary rounded">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col ms-n2 mb-3">
                                    <h3 class="fs-6 fw-bold mb-1">{{__('Notaire Activity')}}</h3>
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="small">8 minutes ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0">
                            <div class="row ps-lg-1">
                                <div class="col-auto">
                                    <div class="icon-shape icon-xs icon-shape-warning rounded">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col ms-n2 mb-3">
                                    <h3 class="fs-6 fw-bold mb-1">{{__('Conservateur Activity')}}</h3>
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="small">10 minutes ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-9'>
            <div class="card p-3 mb-3">
                <legend class="w-auto">Informations on the Land</legend>
                <div class='row gap-4'>
                    <div class="col">
                        <a href="#" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex ">
                                <div class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3">
                                    <span class="text-white">#{{ initials($operation->titreFoncier->numero_titre_foncier) }}</span>
                                </div>
                                <div class="d-block">
                                    <span class="fw-bolder">No. {{ $operation->titreFoncier->numero_titre_foncier }}</span>
                                    <div class="small text-gray ">
                                        <span class="fw-bold d-flex align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-xxs me-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                            </svg>{{ !empty($operation->titreFoncier) ? $operation->titreFoncier->date_de_delivrance_du_TF : '' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if (!empty($operation->titreFoncier))
                            <span class="fw-light badge badge-md bg-{{ $operation->titreFoncier->EtatTFStyle }} rounded-1 ">{{ $operation->titreFoncier->etat_TF }}</span>
                            @endif
                        </a>

                        <div class="py-3">
                            <div class="d-block  d-flex flex-row align-items-center mb-3">
                                <div class="d-flex align-items-center me-3">
                                    <div class="icon-shape icon-xs icon-shape-danger rounded me-2">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="d-block">
                                        <label class="mb-0" style="font-size: small;">{{ __('Total SA') }}</label>
                                        <h6 class="mb-0" style="font-size: small;">
                                            {{ number_format($operation->titreFoncier->superficie_du_TF_mere * 0.0001, 2) }}
                                            ha
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-3 ">
                                    <div class="icon-shape icon-xs icon-shape-purple rounded me-2">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="d-block">
                                        <label class="mb-0" style="font-size: small;">Sessions</label>
                                        <h6 class="mb-0" style="font-size: small;">9,567</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-3">
                                    <div class="icon-shape icon-xs icon-shape-purple rounded me-3">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="d-block">
                                        <label class="mb-0" style="font-size: small;">Sessions</label>
                                        <h6 class="mb-0" style="font-size: small;">9,567</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-3">
                                    <div class="icon-shape icon-xs icon-shape-purple rounded me-2">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="d-block">
                                        <label class="mb-0" style="font-size: small;">Sessions</label>
                                        <h6 class="mb-0" style="font-size: small;">9,567</h6>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-bolder mt-2">{{ __('Contacts') }}</span>
                            <div class='d-flex justify-content-between border-bottom '>
                                <a href="#" class="d-flex align-items-center  py-1">
                                    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white" style="font-size: small;">{{ initials($operation->maeture) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold " style="font-size: small;">{{ ucwords($operation->maeture) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Maeture') }}
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="d-flex align-items-center py-1">
                                    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white" style="font-size: small;">{{ initials($operation->promoteur_immobiliere) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold " style="font-size: small;">{{ ucwords($operation->promoteur_immobiliere) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Promoteur immobiliere') }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class='d-flex justify-content-between border-bottom '>
                                <a href="#" class="d-flex align-items-center  py-1">
                                    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white" style="font-size: small;">{{ initials($operation->agent_immobiliere) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold " style="font-size: small;">{{ ucwords($operation->titreFoncier->agent_immobiliere) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Agent immobiliere') }}
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="d-flex align-items-center py-1">
                                    <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white" style="font-size: small;">{{ initials($operation->promoteur_immobiliere) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold " style="font-size: small;">{{ ucwords($operation->titreFoncier->promoteur_immobiliere) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Promoteur immobiliere') }}
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <!-- {{ $operation->titreFoncier->superficie_du_TF_mere }}
                            {{ $operation->titreFoncier->superficie_vendue_du_TF_mere }}
                            {{ $operation->titreFoncier->superficie_restant_du_TF_mere }} -->

                        </div>
                        @if (!empty($operation->titreFoncier))
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-bolder ">{{ __('Location') }}</span> : <span class="fw-light mx-2">
                                {{ $operation->titreFoncier->region->region_name }} >
                                {{ $operation->titreFoncier->division->division_name }} >
                                {{ $operation->titreFoncier->subDivision->sub_division_name }} >
                                {{ $operation->titreFoncier->lieu_dit }} </span>
                        </div>
                        <div class='mb-2'>
                            <span class="fw-bolder mt-2">{{ __('Coordinates') }}</span> :
                            {{ $operation->titreFoncier->coordonnees }}
                        </div>
                        @endif
                    </div>
                    <div class="col">
                        <h4 class="fs-5">{{ __('Land Title Owners') }}</h4>
                        @if (!empty($operation->titreFoncier))
                        @foreach ($operation->titreFoncier->users as $key => $option)
                        <a href="#" class="d-flex align-items-center {{ !$loop->last ? 'border-bottom' : '' }} py-1">
                            <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                <span class="text-white" style="font-size: small;">{{ $option->initials }}</span>
                            </div>
                            <div class="d-block">
                                <span class="fw-bold " style="font-size: small;">{{ ucwords($option->name) }}</span>
                                <div class="small text-gray" style="font-size: x-small;">
                                    <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                        </path>
                                    </svg> {{ $option->email }}
                                    <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg> {{ $option->primary_phone_number }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card p-4 mb-2">
                <legend class="w-auto">{{ __('Geometre') }}</legend>

                @if(!empty($operation->geometre_id))
                <div class='d-flex justify-content-between'>
                    <a href="#" class="d-flex align-items-center">
                        <div class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold fs-6 rounded bg-primary me-2">
                            <span class="text-white">{{ initials($operation->geometre->first_name) }}</span>
                        </div>
                        <div class="d-block">
                            <span class="fw-bolder fs-6">{{ ucwords($operation->geometre->first_name) }}
                                {{ $operation->geometre->last_name }}</span>
                            <div class="small text-gray d-flex align-items-center">
                                <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg> {{ $operation->geometre->phone_number }}
                            </div>
                        </div>
                    </a>
                    <div>
                        <span class="fw-normal badge super-badge p-2 bg-{{$operation->geometreStatusStyle}} round">{{$operation->statut_geometre}}</span>
                    </div>
                </div>
                <hr>
                @if(!empty($operation->parcels))
                @foreach($operation->parcels as $parcel)
                {{$parcel->coordonnees_du_lot}}
                @endforeach
                @endif
                @endif
            </div>


            <div class="card p-4 mb-2">
                @if(!empty($operation->notaire_id))
                <legend class="w-auto">{{ __('Notaire') }}</legend>
                <div class='d-flex justify-content-between'>
                    <a href="#" class="d-flex align-items-center">
                        <div class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold fs-6 rounded bg-primary me-2">
                            <span class="text-white">{{ initials($operation->notaire->first_name) }}</span>
                        </div>
                        <div class="d-block">
                            <span class="fw-bolder fs-6">{{ ucwords($operation->notaire->first_name) }}
                                {{ $operation->notaire->last_name }}</span>
                            <div class="small text-gray d-flex align-items-center">
                                <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg> {{ $operation->notaire->phone_number }}
                            </div>
                        </div>
                    </a>
                    <div>
                        <span class="fw-normal badge super-badge p-2 bg-{{$operation->notaireStatusStyle}} round">{{$operation->statut_notaire}}</span>
                    </div>
                </div>

                <hr>

                @endif
            </div>
            <div class="card p-4 ">
                @if(!empty($operation->conservateur_id))
                <legend class="w-auto">{{ __('conservateur') }}</legend>
                <div class='d-flex justify-content-between'>
                    <a href="#" class="d-flex align-items-center">
                        <div class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold fs-6 rounded bg-primary me-2">
                            <span class="text-white">{{ initials($operation->conservateur->first_name) }}</span>
                        </div>
                        <div class="d-block">
                            <span class="fw-bolder fs-6">{{ ucwords($operation->conservateur->first_name) }}
                                {{ $operation->conservateur->last_name }}</span>
                            <div class="small text-gray d-flex align-items-center">
                                <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg> {{ $operation->conservateur->primary_phone_number }}
                            </div>
                        </div>
                    </a>
                    <div>
                        <span class="fw-normal badge super-badge p-2 bg-{{$operation->conservateurStatusStyle}} round">{{$operation->statut_conservateur}}</span>
                    </div>
                </div>
                <hr>

                @endif
            </div>

        </div>
    </div>
</div>