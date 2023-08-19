<div>
    <x-alert />
    @if ($errors->any())
        <div class="alert alert-danger alert-fixed border-danger-dash alert-important alert-dimissable ">
            <div class='d-flex justify-content-between align-items-start'>

                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li class="px-n4">{{ $error }}</li>
                    @endforeach
                </ul>


                <div class='d-flex justify-content-end align-items-start'>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <x-delete-modal />
    {{-- @include('livewire.portal.parcels.partials.create-sale') --}}
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
                        {{-- <li class="breadcrumb-item"><a href="/">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item "><a href="{{route('portal.parcelss.index')}}">{{__('parcelss')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Sale Lot')}}</li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3 '>
            <div class="card p-3 mb-3">
                <h5 class="w-auto">{{ __('Simple Sale') }}</h5>
                <ul>
                    <li>{{ __('Update Land information') }}</li>
                    <li>{{ __('Update Promoter information') }}</li>
                </ul>
            </div>
            <div class="card p-3 mb-3">
                <h5 class="w-auto">{{ __('Contacts') }}</h5>
            </div>
            <div class="card p-3">
                <h5 class="w-auto">{{ __('Basic Stats') }}</h5>

                {{-- <div class="d-flex align-items-center mb-2 border-1 border-bottom">
                    <span class="fw-light ">{{__('Total Blocks')}}</span> : <span class="fw-bolder mx-2">{{count($parcels->blocks)}} </span>
                </div>
                <div class="d-flex align-items-center mb-2 border-1 border-bottom">
                    <span class="fw-light ">{{__('Total Lots')}}</span> : <span class="fw-bolder mx-2">{{count($parcels->parcels)}} </span>
                </div>
                <div class="d-flex align-items-center mb-2 border-1 border-bottom">
                    <span class="fw-light ">{{__('Total Public Lots')}}</span> : <span class="fw-bolder mx-2">{{count($parcels->parcels->where('type','public'))}} </span>
                </div>
                <div class="d-flex align-items-center mb-2 border-1 border-bottom">
                    <span class="fw-light ">{{__('Total Normal Lots')}}</span> : <span class="fw-bolder mx-2">{{count($parcels->parcels->where('type','normale'))}} </span>
                </div>
                <div class="d-flex align-items-center mb-2 border-1 border-bottom">
                    <span class="fw-light ">{{__('Total Lots Sold')}}</span> : <span class="fw-bolder mx-2">{{count($parcels->parcels->where('date_de_vente','<>',null))}} </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="fw-light ">{{__('Total Lots Remaining')}}</span> : <span class="fw-bolder mx-2">{{count($parcels->parcels->where('date_de_vente',null))}} </span>
                </div> --}}
            </div>

        </div>
        <div class='col-md-9'>
            <div class="card p-4 mb-3">
                <legend class="w-auto">Informations on the Land</legend>
                <div class='row gap-4'>
                    <div class="col">
                        <a href="#" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex ">
                                <div
                                    class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3">
                                    <span
                                        class="text-white">#{{ initials($parcel->titreFoncier->numero_titre_foncier) }}</span>
                                </div>
                                <div class="d-block">
                                    <span class="fw-bolder">No. {{ $parcel->titreFoncier->numero_titre_foncier }}</span>
                                    <div class="small text-gray ">
                                        <span class="fw-bold d-flex align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon icon-xxs me-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                            </svg>{{ !empty($parcel->titreFoncier) ? $parcel->titreFoncier->date_de_delivrance_du_TF : '' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if (!empty($parcel->titreFoncier))
                                <span
                                    class="fw-light badge badge-md bg-{{ $parcel->titreFoncier->EtatTFStyle }} rounded-1 ">{{ $parcel->titreFoncier->etat_TF }}</span>
                            @endif
                        </a>

                        <div class="py-3">
                            <div class="d-block  d-flex flex-row align-items-center mb-3">
                                <div class="d-flex align-items-center me-3">
                                    <div class="icon-shape icon-xs icon-shape-danger rounded me-2">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="d-block">
                                        <label class="mb-0" style="font-size: small;">{{ __('Total SA') }}</label>
                                        <h6 class="mb-0" style="font-size: small;">
                                            {{ number_format($parcel->titreFoncier->superficie_du_TF_mere * 0.0001, 2) }}
                                            ha</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-3 ">
                                    <div class="icon-shape icon-xs icon-shape-purple rounded me-2">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
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
                                            <path
                                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
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
                                            <path
                                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
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
                                    <div
                                        class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white"
                                            style="font-size: small;">{{ initials($parcel->maeture) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold "
                                            style="font-size: small;">{{ ucwords($parcel->maeture) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Maeture') }}
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="d-flex align-items-center py-1">
                                    <div
                                        class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white"
                                            style="font-size: small;">{{ initials($parcel->promoteur_immobiliere) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold "
                                            style="font-size: small;">{{ ucwords($parcel->promoteur_immobiliere) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Promoteur immobiliere') }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class='d-flex justify-content-between border-bottom '>
                                <a href="#" class="d-flex align-items-center  py-1">
                                    <div
                                        class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white"
                                            style="font-size: small;">{{ initials($parcel->agent_immobiliere) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold "
                                            style="font-size: small;">{{ ucwords($parcel->titreFoncier->agent_immobiliere) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Agent immobiliere') }}
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="d-flex align-items-center py-1">
                                    <div
                                        class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white"
                                            style="font-size: small;">{{ initials($parcel->promoteur_immobiliere) }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold "
                                            style="font-size: small;">{{ ucwords($parcel->titreFoncier->promoteur_immobiliere) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ __('Promoteur immobiliere') }}
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <!-- {{ $parcel->titreFoncier->superficie_du_TF_mere }}
                            {{ $parcel->titreFoncier->superficie_vendue_du_TF_mere }}
                            {{ $parcel->titreFoncier->superficie_restant_du_TF_mere }} -->

                        </div>
                        @if (!empty($parcel->titreFoncier))
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bolder ">{{ __('Location') }}</span> : <span class="fw-light mx-2">
                                    {{ $parcel->titreFoncier->region->region_name }} >
                                    {{ $parcel->titreFoncier->division->division_name }} >
                                    {{ $parcel->titreFoncier->subDivision->sub_division_name }} >
                                    {{ $parcel->titreFoncier->lieu_dit }} </span>
                            </div>
                            <div class='mb-2'>
                                <span class="fw-bolder mt-2">{{ __('Coordinates') }}</span> :
                                {{ $parcel->titreFoncier->coordonnees }}
                            </div>
                        @endif
                    </div>
                    <div class="col">
                        <h4 class="fs-5">{{ __('Land Title Owners') }}</h4>
                        @if (!empty($parcel->titreFoncier))
                            @foreach ($parcel->titreFoncier->users as $key => $option)
                                <a href="#"
                                    class="d-flex align-items-center {{ !$loop->last ? 'border-bottom' : '' }} py-1">
                                    <div
                                        class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2">
                                        <span class="text-white"
                                            style="font-size: small;">{{ $option->initials }}</span>
                                    </div>
                                    <div class="d-block">
                                        <span class="fw-bold "
                                            style="font-size: small;">{{ ucwords($option->name) }}</span>
                                        <div class="small text-gray" style="font-size: x-small;">
                                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg> {{ $option->email }}
                                            <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
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
            <div class="card p-4 ">
                @foreach ($membres as $membre)
                    @if (isset($membre->type_membre) && $membre->type_membre == 'notaire')
                        <legend class="w-auto">{{ __('Notaire') }}</legend>


                        <div class="card pb-3">
                            <div class="table-responsive  text-gray-700">
                                <table class="table employee-table table-hover align-items-center ">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom">{{ __('NAME') }}</th>
                                            <th class="border-bottom">{{ __('Cabinet') }}</th>
                                            <th class="border-bottom">{{ __('Commentaire du notaire') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>

                                                <a href="#" class="d-flex align-items-center">
                                                    <div
                                                        class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold fs-6 rounded bg-primary me-2">
                                                        <span
                                                            class="text-white">{{ initials($parcel->notaire->first_name) }}</span>
                                                    </div>
                                                    <div class="d-block">
                                                        <span
                                                            class="fw-bolder fs-6">{{ ucwords($parcel->notaire->first_name) }}
                                                            {{ $parcel->notaire->last_name }}</span>
                                                        <div class="small text-gray">
                                                            <svg class="icon icon-xxs me-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                                </path>
                                                            </svg> {{ $parcel->notaire->address }}
                                                        </div>
                                                        <div class="small text-gray d-flex align-items-end">
                                                            <svg class="icon icon-xxs me-1 " fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                                </path>
                                                            </svg> {{ $parcel->notaire->phone_number }} |
                                                            {{ $parcel->notaire->post }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>{{ $parcel->notaire->cabinet->nom_cabinet }}</td>
                                            <td>{{ $parcel->commentaire_du_notaire }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @elseif(isset($membre->type_membre) && $membre->type_membre == 'geometre')
                        <div class="card p-4 ">
                            <legend class="w-auto">{{ __('Geometre') }}</legend>


                            <div class="card pb-3">
                                <div class="table-responsive  text-gray-700">
                                    <table class="table employee-table table-hover align-items-center ">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom">{{ __('NAME') }}</th>
                                                <th class="border-bottom">{{ __('Cabinet') }}</th>
                                                <th class="border-bottom">
                                                    {{ __('Commentaire de Geometre') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>

                                                {{-- <td>
        
                                                    <a href="#" class="d-flex align-items-center">
                                                        <div
                                                            class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold fs-6 rounded bg-primary me-2">
                                                            <span
                                                                class="text-white">{{ initials($parcel->geometre->first_name) }}</span>
                                                        </div>
                                                        <div class="d-block">
                                                            <span
                                                                class="fw-bolder fs-6">{{ ucwords($parcel->geometre->first_name) }}
                                                                {{ $parcel->geometre->last_name }}</span>
                                                            <div class="small text-gray">
                                                                <svg class="icon icon-xxs me-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                                    </path>
                                                                </svg> {{ $parcel->geometre->address }}
                                                            </div>
                                                            <div class="small text-gray d-flex align-items-end">
                                                                <svg class="icon icon-xxs me-1 " fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                                    </path>
                                                                </svg> {{ $parcel->geometre->phone_number }} |
                                                                {{ $parcel->geometre->post }}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td> --}}
                                                {{-- <td>{{ $parcel->geometre->cabinet->nom_cabinet }} --}}
                                                </td>
                                                <td>{{ $parcel->commentaire_du_geometre }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <div class="text-center text-gray-800 mt-2">
                                                        <h4 class="fs-4 fw-bold">
                                                            {{ __('Opps nothing here') }} &#128540;
                                                        </h4>
                                                        <p>{{ __('No Record Found..!') }}</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
 

</div>



