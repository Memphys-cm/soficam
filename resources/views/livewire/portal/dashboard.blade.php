<div>
    <div class='pb-3'>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-0 align-items-center">
            <div class="mb-lg-0">

                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <div>
                        <span class="text-secondary">{{ __('Bienvenue') }},</span> <span
                            class="h5 ">{{ auth()->user()->name }}</span>
                    </div>
                </h1>
                <p class="mt-n2">{{ __('Gérer les entreprises et leurs détails relatifs') }} &#128524;</p>
            </div>
            <div class="d-flex justify-content-between">
                {{ \Str::upper(\Str::random(5)) . '' . now()->format('msu') }} <br>
            </div>
        </div>
    </div>
    <h4>Statistiques globales</h4>

    <div class="row g-3 mb-3">
        <div class="col-md-6 col-xxl-4">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Titres Fonciers') }}</h6>
                </div>
                <div class="p-3 row d-flex row justify-content-between align-iterms-center">
                    <div class="col-md-4 d-flex align-items-center">
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_titres_fonciers }} </p>
                    </div>
                    <div class="col-md-7">
                        <p class="font-sans-serif lh-1 fs-4">
                            <span> {{__('Hommes')}} : </span>
                            <span> {{ $tf_homme }} , </span>
                            <span> {{number_format($percent_homme,2)}} %</span> 
                        </p>
                        <p class="font-sans-serif lh-1 fs-4">
                            <span> {{__('Femmes')}} : </span>
                            <span> {{ $tf_femme }} , </span> 
                            <span> {{number_format($percent_femme,2)}} %</span>
                        </p>
                    </div>
                    <div class="col-md-1">
                        <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>

                    </div>
                    <div class="d-flex justify-content-center">
                        <a href=""> {{__('Details')}} </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-4">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Dossiers Traites') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $dossier_traites }} 
                            {{-- {{ __('Cabinets de Notaires') }}    --}}
                        </p>
                        {{-- <p class="font-sans-serif lh-1 fs-4">{{ $all_cabinet_geometre }} {{ __('Burreaux D\'Etudes') }}</p>
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_notaire_membre }} {{ __('Notaires et Claire de Notaires') }}</p>
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_geometre_membre }} {{ __('Geometres') }}</p> --}}

                    </div>
                    <div class="">
                        <svg class="icon text-info " xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-4">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Revenues') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{number_format($totalSalesAmount, 0, '', ' ')}}  {{__('FCFA')}}
                            {{-- {{ __('Cabinets de Notaires') }}    --}}
                        </p>
                        {{-- <p class="font-sans-serif lh-1 fs-4">{{ $all_cabinet_geometre }} {{ __('Burreaux D\'Etudes') }}</p>
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_notaire_membre }} {{ __('Notaires et Claire de Notaires') }}</p>
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_geometre_membre }} {{ __('Geometres') }}</p> --}}
                    </div>
                    <div class="">
                        <svg class="icon text-info " xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-6 col-xxl-4">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Intervenants / Partenaires') }}</h6>
                </div>
                <div class="p-3 d-flex justify-content-between align-iterms-center">
                    <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_cabinet_notaire }} {{ __('Cabinets de Notaires') }}</p>
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_cabinet_geometre }} {{ __('Burreaux D\'Etudes') }}</p>
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_notaire_membre }} {{ __('Notaires et Claire de Notaires') }}</p>
                        <p class="font-sans-serif lh-1 fs-4">{{ $all_geometre_membre }} {{ __('Geometres') }}</p>
                    </div>
                    <div class="">
                        <svg class="icon text-info " xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>

                    </div>
                </div>
            </div>
        </div> --}}


    </div>
  
  <h4>Activité récente</h4>

    <div class="row">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xxl-flex align-items-center">
                        <span class="mb-2">  {{__('Filtrer Les Titres Fonciers Sur Une periode')}} </span> <br>
                        <div class="d-flex justify-content-around">
                            <input  type="date" wire:model="start_date_tf" class="form-control me-2">
                            <input  type="date" wire:model="end_date_tf" class="form-control me-2">
                        </div>
                        <div class="col-12 col-xxl-8 ps-xxl-4 pe-xxl-0 my-1">
                            {{-- <h2 class="fs-6 fw-normal mb-1 text-gray-400 my-1"> {{__('nombres Titres Fonciers sur une periode')}} </h2> --}}
                             <h4 class=" mb-1">  <span> {{__('Nombres')}} </span>  <span class="fw-extrabold"> {{number_format($filter_tf > 0 ? $filter_tf : 0)}} </span>  </h4><small class="d-flex align-items-center"><svg
                                    class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg> <span> {{__('Periode')}} : </span>  {{$start_date_tf}} {{__("Au")}} {{$end_date_tf}} </small>
                            <div class="small d-flex mt-1">
                                <div>
                                    <svg class="icon icon-xs text-success" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-success fw-bolder">18,2%</span> Depuis le mois dernier
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xxl-flex align-items-center">
                        <span class="mb-2">  {{__('Nombres de Dossiers traites sur une periode')}} </span> <br>
                        <div class="d-flex justify-content-around">
                            <input  type="date" wire:model="start_date_dos" class="form-control me-2">
                            <input  type="date" wire:model="end_date_dos" class="form-control me-2">
                        </div>
                        <div class="col-12 col-xxl-8 ps-xxl-4 pe-xxl-0 my-1">
                            {{-- <h2 class="fs-6 fw-normal mb-1 text-gray-400 my-1"> {{__('nombres Titres Fonciers sur une periode')}} </h2> --}}
                             <h4 class=" mb-1">  <span> {{__('Nombres')}} </span>  <span class="fw-extrabold"> {{number_format($filter_tf > 0 ? $filter_tf : 0)}} </span>  </h4><small class="d-flex align-items-center"><svg
                                    class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg> <span> {{__('Periode')}} : </span>  {{$start_date_tf}} {{__("Au")}} {{$end_date_tf}} </small>
                            <div class="small d-flex mt-1">
                                <div>
                                    <svg class="icon icon-xs text-success" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> 
                                    <span class="text-success fw-bolder">18,2%</span> Depuis le mois dernier
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xxl-flex align-items-center">
                        <span class="mb-2">  {{__('Recettes Enregistrees sur une periode')}} </span> <br>
                        <div class="d-flex justify-content-around">
                            <input  type="date" wire:model="start_date" class="form-control me-2">
                            <input  type="date" wire:model="end_date" class="form-control me-2">
                        </div>
                        <div class="col-12 col-xxl-8 ps-xxl-4 pe-xxl-0 my-1">
                            {{-- <h2 class="fs-6 fw-normal mb-1 text-gray-400 my-1"> {{__('nombres Titres Fonciers sur une periode')}} </h2> --}}
                             <h4 class=" mb-1">  <span> {{__('Nombres')}} </span>  <span class="fw-extrabold">   {{number_format($filter_amount > 0 ? $filter_amount : 0)}} {{__('FCFA')}} </span>  </h4><small class="d-flex align-items-center"><svg
                                    class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg> <span> {{__('Periode')}} : </span>  {{$start_date}} {{__("Au")}} {{$end_date}} </small>
                            <div class="small d-flex mt-1">
                                <div>
                                    <svg class="icon icon-xs text-success" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-success fw-bolder">18,2%</span> Depuis le mois dernier
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br>


    <div class="row">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xxl-flex align-items-center">
                        <div class="col-12 col-xxl-6 px-xxl-0 mb-3 mb-xxl-0" style="position: relative;">
                            <div id="chart-customers" style="min-height: 140px;">
                                <div id="apexchartsljrrv2i8h"
                                    class="apexcharts-canvas apexchartsljrrv2i8h apexcharts-theme-light"
                                    style="width: 379px; height: 140px;"><svg id="SvgjsSvg2563" width="379"
                                        height="140" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG2565" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(0, 0)">
                                            <defs id="SvgjsDefs2564">
                                                <clipPath id="gridRectMaskljrrv2i8h">
                                                    <rect id="SvgjsRect2571" width="387" height="144"
                                                        x="-4" y="-2" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskljrrv2i8h">
                                                    <rect id="SvgjsRect2572" width="383" height="144"
                                                        x="-2" y="-2" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient2577" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop2578" stop-opacity="0.65"
                                                        stop-color="rgba(49,49,106,0.65)" offset="0"></stop>
                                                    <stop id="SvgjsStop2579" stop-opacity="0.5"
                                                        stop-color="rgba(152,152,181,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop2580" stop-opacity="0.5"
                                                        stop-color="rgba(152,152,181,0.5)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <line id="SvgjsLine2570" x1="302.7" y1="0" x2="302.7"
                                                y2="140" stroke="#b6b6b6" stroke-dasharray="3"
                                                class="apexcharts-xcrosshairs" x="302.7" y="0"
                                                width="1" height="140" fill="#b1b9c4" filter="none"
                                                fill-opacity="0.9" stroke-width="1"></line>
                                            <g id="SvgjsG2583" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG2584" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, 2.75)"></g>
                                            </g>
                                            <g id="SvgjsG2597" class="apexcharts-grid">
                                                <g id="SvgjsG2598" class="apexcharts-gridlines-horizontal"
                                                    style="display: none;">
                                                    <line id="SvgjsLine2600" x1="0" y1="0"
                                                        x2="379" y2="0" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2601" x1="0" y1="35"
                                                        x2="379" y2="35" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2602" x1="0" y1="70"
                                                        x2="379" y2="70" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2603" x1="0" y1="105"
                                                        x2="379" y2="105" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2604" x1="0" y1="140"
                                                        x2="379" y2="140" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG2599" class="apexcharts-gridlines-vertical"
                                                    style="display: none;"></g>
                                                <line id="SvgjsLine2606" x1="0" y1="140" x2="379"
                                                    y2="140" stroke="transparent" stroke-dasharray="0"></line>
                                                <line id="SvgjsLine2605" x1="0" y1="1" x2="0"
                                                    y2="140" stroke="transparent" stroke-dasharray="0"></line>
                                            </g>
                                            <g id="SvgjsG2573" class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG2574" class="apexcharts-series" seriesName="Clients"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath2581"
                                                        d="M 0 140L 0 119C 13.264999999999999 119 24.634999999999998 112 37.9 112C 51.165 112 62.535 105 75.8 105C 89.065 105 100.435 57.75 113.7 57.75C 126.965 57.75 138.335 66.5 151.6 66.5C 164.865 66.5 176.235 113.75 189.5 113.75C 202.765 113.75 214.135 57.75 227.4 57.75C 240.66500000000002 57.75 252.03500000000003 8.75 265.3 8.75C 278.565 8.75 289.935 26.25 303.2 26.25C 316.465 26.25 327.835 106.75 341.09999999999997 106.75C 354.36499999999995 106.75 365.735 115.5 379 115.5C 379 115.5 379 115.5 379 140M 379 115.5z"
                                                        fill="url(#SvgjsLinearGradient2577)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskljrrv2i8h)"
                                                        pathTo="M 0 140L 0 119C 13.264999999999999 119 24.634999999999998 112 37.9 112C 51.165 112 62.535 105 75.8 105C 89.065 105 100.435 57.75 113.7 57.75C 126.965 57.75 138.335 66.5 151.6 66.5C 164.865 66.5 176.235 113.75 189.5 113.75C 202.765 113.75 214.135 57.75 227.4 57.75C 240.66500000000002 57.75 252.03500000000003 8.75 265.3 8.75C 278.565 8.75 289.935 26.25 303.2 26.25C 316.465 26.25 327.835 106.75 341.09999999999997 106.75C 354.36499999999995 106.75 365.735 115.5 379 115.5C 379 115.5 379 115.5 379 140M 379 115.5z"
                                                        pathFrom="M -1 140L -1 140L 37.9 140L 75.8 140L 113.7 140L 151.6 140L 189.5 140L 227.4 140L 265.3 140L 303.2 140L 341.09999999999997 140L 379 140">
                                                    </path>
                                                    <path id="SvgjsPath2582"
                                                        d="M 0 119C 13.264999999999999 119 24.634999999999998 112 37.9 112C 51.165 112 62.535 105 75.8 105C 89.065 105 100.435 57.75 113.7 57.75C 126.965 57.75 138.335 66.5 151.6 66.5C 164.865 66.5 176.235 113.75 189.5 113.75C 202.765 113.75 214.135 57.75 227.4 57.75C 240.66500000000002 57.75 252.03500000000003 8.75 265.3 8.75C 278.565 8.75 289.935 26.25 303.2 26.25C 316.465 26.25 327.835 106.75 341.09999999999997 106.75C 354.36499999999995 106.75 365.735 115.5 379 115.5"
                                                        fill="none" fill-opacity="1" stroke="#31316a"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="4"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskljrrv2i8h)"
                                                        pathTo="M 0 119C 13.264999999999999 119 24.634999999999998 112 37.9 112C 51.165 112 62.535 105 75.8 105C 89.065 105 100.435 57.75 113.7 57.75C 126.965 57.75 138.335 66.5 151.6 66.5C 164.865 66.5 176.235 113.75 189.5 113.75C 202.765 113.75 214.135 57.75 227.4 57.75C 240.66500000000002 57.75 252.03500000000003 8.75 265.3 8.75C 278.565 8.75 289.935 26.25 303.2 26.25C 316.465 26.25 327.835 106.75 341.09999999999997 106.75C 354.36499999999995 106.75 365.735 115.5 379 115.5"
                                                        pathFrom="M -1 140L -1 140L 37.9 140L 75.8 140L 113.7 140L 151.6 140L 189.5 140L 227.4 140L 265.3 140L 303.2 140L 341.09999999999997 140L 379 140">
                                                    </path>
                                                    <g id="SvgjsG2575" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0">
                                                        <g class="apexcharts-series-markers">
                                                            <circle id="SvgjsCircle2612" r="0" cx="303.2"
                                                                cy="26.25"
                                                                class="apexcharts-marker wqqzf606b no-pointer-events"
                                                                stroke="#ffffff" fill="#31316a" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9"
                                                                default-marker-size="0"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG2576" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine2607" x1="0" y1="0" x2="379"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine2608" x1="0" y1="0" x2="379"
                                                y2="0" stroke-dasharray="0" stroke-width="0"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG2609" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG2610" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG2611" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <rect id="SvgjsRect2569" width="0" height="0" x="0"
                                            y="0" rx="0" ry="0" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                        <g id="SvgjsG2596" class="apexcharts-yaxis" rel="0"
                                            transform="translate(-18, 0)"></g>
                                        <g id="SvgjsG2566" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 70px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                        style="left: 181.247px; top: 29.25px;">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Inter; font-size: 12px;">09 Feb</div>
                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                            style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(49, 49, 106);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Inter; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label">Clients: </span><span
                                                        class="apexcharts-tooltip-text-value">650</span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 404px; height: 141px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xxl-flex align-items-center">
                        <div class="col-12 col-xxl-6 px-xxl-0 mb-3 mb-xxl-0" style="position: relative;">
                            <div id="chart-revenue" style="min-height: 140px;">
                                <div id="apexchartsn6b0bl2d"
                                    class="apexcharts-canvas apexchartsn6b0bl2d apexcharts-theme-light"
                                    style="width: 379px; height: 140px;"><svg id="SvgjsSvg2613" width="379"
                                        height="140" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG2615" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(0, 0)">
                                            <defs id="SvgjsDefs2614">
                                                <linearGradient id="SvgjsLinearGradient2618" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop2619" stop-opacity="0.4"
                                                        stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop2620" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop2621" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskn6b0bl2d">
                                                    <rect id="SvgjsRect2624" width="383" height="140"
                                                        x="-2" y="0" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskn6b0bl2d">
                                                    <rect id="SvgjsRect2625" width="383" height="144"
                                                        x="-2" y="-2" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <line id="SvgjsLine2623" x1="351.12500708443775" y1="0"
                                                x2="351.12500708443775" y2="140" stroke-dasharray="3"
                                                class="apexcharts-xcrosshairs" x="351.12500708443775" y="0"
                                                width="1" height="140" fill="url(#SvgjsLinearGradient2618)"
                                                filter="none" fill-opacity="0.9" stroke-width="0"></line>
                                            <g id="SvgjsG2643" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG2644" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"></g>
                                            </g>
                                            <g id="SvgjsG2653" class="apexcharts-grid">
                                                <g id="SvgjsG2654" class="apexcharts-gridlines-horizontal"
                                                    style="display: none;">
                                                    <line id="SvgjsLine2656" x1="0" y1="0"
                                                        x2="379" y2="0" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2657" x1="0" y1="35"
                                                        x2="379" y2="35" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2658" x1="0" y1="70"
                                                        x2="379" y2="70" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2659" x1="0" y1="105"
                                                        x2="379" y2="105" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2660" x1="0" y1="140"
                                                        x2="379" y2="140" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG2655" class="apexcharts-gridlines-vertical"
                                                    style="display: none;"></g>
                                                <line id="SvgjsLine2662" x1="0" y1="140" x2="379"
                                                    y2="140" stroke="transparent" stroke-dasharray="0"></line>
                                                <line id="SvgjsLine2661" x1="0" y1="1" x2="0"
                                                    y2="140" stroke="transparent" stroke-dasharray="0"></line>
                                            </g>
                                            <g id="SvgjsG2626" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG2627" class="apexcharts-series" rel="1"
                                                    seriesName="Sales" data:realIndex="0">
                                                    <rect id="SvgjsRect2629" width="13.535714285714286" height="140"
                                                        x="20.30357142857143" y="0" rx="5"
                                                        ry="5" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#F2F4F6"
                                                        class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath2630"
                                                        d="M 20.30357142857143 140L 20.30357142857143 26Q 20.30357142857143 21 25.30357142857143 21L 28.839285714285715 21Q 33.839285714285715 21 33.839285714285715 26L 33.839285714285715 26L 33.839285714285715 140L 33.839285714285715 140z"
                                                        fill="rgba(49,49,106,0.85)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskn6b0bl2d)"
                                                        pathTo="M 20.30357142857143 140L 20.30357142857143 26Q 20.30357142857143 21 25.30357142857143 21L 28.839285714285715 21Q 33.839285714285715 21 33.839285714285715 26L 33.839285714285715 26L 33.839285714285715 140L 33.839285714285715 140z"
                                                        pathFrom="M 20.30357142857143 140L 20.30357142857143 140L 33.839285714285715 140L 33.839285714285715 140L 33.839285714285715 140L 33.839285714285715 140L 33.839285714285715 140L 20.30357142857143 140"
                                                        cy="21" cx="74.44642857142858" j="0"
                                                        val="34" barHeight="119" barWidth="13.535714285714286">
                                                    </path>
                                                    <rect id="SvgjsRect2631" width="13.535714285714286" height="140"
                                                        x="74.44642857142858" y="0" rx="5"
                                                        ry="5" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#F2F4F6"
                                                        class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath2632"
                                                        d="M 74.44642857142858 140L 74.44642857142858 43.5Q 74.44642857142858 38.5 79.44642857142858 38.5L 82.98214285714288 38.5Q 87.98214285714288 38.5 87.98214285714288 43.5L 87.98214285714288 43.5L 87.98214285714288 140L 87.98214285714288 140z"
                                                        fill="rgba(49,49,106,0.85)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskn6b0bl2d)"
                                                        pathTo="M 74.44642857142858 140L 74.44642857142858 43.5Q 74.44642857142858 38.5 79.44642857142858 38.5L 82.98214285714288 38.5Q 87.98214285714288 38.5 87.98214285714288 43.5L 87.98214285714288 43.5L 87.98214285714288 140L 87.98214285714288 140z"
                                                        pathFrom="M 74.44642857142858 140L 74.44642857142858 140L 87.98214285714288 140L 87.98214285714288 140L 87.98214285714288 140L 87.98214285714288 140L 87.98214285714288 140L 74.44642857142858 140"
                                                        cy="38.5" cx="128.58928571428572" j="1"
                                                        val="29" barHeight="101.5" barWidth="13.535714285714286">
                                                    </path>
                                                    <rect id="SvgjsRect2633" width="13.535714285714286" height="140"
                                                        x="128.58928571428572" y="0" rx="5"
                                                        ry="5" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#F2F4F6"
                                                        class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath2634"
                                                        d="M 128.58928571428572 140L 128.58928571428572 33Q 128.58928571428572 28 133.58928571428572 28L 137.125 28Q 142.125 28 142.125 33L 142.125 33L 142.125 140L 142.125 140z"
                                                        fill="rgba(49,49,106,0.85)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskn6b0bl2d)"
                                                        pathTo="M 128.58928571428572 140L 128.58928571428572 33Q 128.58928571428572 28 133.58928571428572 28L 137.125 28Q 142.125 28 142.125 33L 142.125 33L 142.125 140L 142.125 140z"
                                                        pathFrom="M 128.58928571428572 140L 128.58928571428572 140L 142.125 140L 142.125 140L 142.125 140L 142.125 140L 142.125 140L 128.58928571428572 140"
                                                        cy="28" cx="182.73214285714286" j="2"
                                                        val="32" barHeight="112" barWidth="13.535714285714286">
                                                    </path>
                                                    <rect id="SvgjsRect2635" width="13.535714285714286" height="140"
                                                        x="182.73214285714286" y="0" rx="5"
                                                        ry="5" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#F2F4F6"
                                                        class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath2636"
                                                        d="M 182.73214285714286 140L 182.73214285714286 12Q 182.73214285714286 7 187.73214285714286 7L 191.26785714285714 7Q 196.26785714285714 7 196.26785714285714 12L 196.26785714285714 12L 196.26785714285714 140L 196.26785714285714 140z"
                                                        fill="rgba(49,49,106,0.85)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskn6b0bl2d)"
                                                        pathTo="M 182.73214285714286 140L 182.73214285714286 12Q 182.73214285714286 7 187.73214285714286 7L 191.26785714285714 7Q 196.26785714285714 7 196.26785714285714 12L 196.26785714285714 12L 196.26785714285714 140L 196.26785714285714 140z"
                                                        pathFrom="M 182.73214285714286 140L 182.73214285714286 140L 196.26785714285714 140L 196.26785714285714 140L 196.26785714285714 140L 196.26785714285714 140L 196.26785714285714 140L 182.73214285714286 140"
                                                        cy="7" cx="236.875" j="3" val="38"
                                                        barHeight="133" barWidth="13.535714285714286"></path>
                                                    <rect id="SvgjsRect2637" width="13.535714285714286" height="140"
                                                        x="236.875" y="0" rx="5" ry="5"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#F2F4F6"
                                                        class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath2638"
                                                        d="M 236.875 140L 236.875 8.5Q 236.875 3.5 241.875 3.5L 245.41071428571428 3.5Q 250.41071428571428 3.5 250.41071428571428 8.5L 250.41071428571428 8.5L 250.41071428571428 140L 250.41071428571428 140z"
                                                        fill="rgba(49,49,106,0.85)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskn6b0bl2d)"
                                                        pathTo="M 236.875 140L 236.875 8.5Q 236.875 3.5 241.875 3.5L 245.41071428571428 3.5Q 250.41071428571428 3.5 250.41071428571428 8.5L 250.41071428571428 8.5L 250.41071428571428 140L 250.41071428571428 140z"
                                                        pathFrom="M 236.875 140L 236.875 140L 250.41071428571428 140L 250.41071428571428 140L 250.41071428571428 140L 250.41071428571428 140L 250.41071428571428 140L 236.875 140"
                                                        cy="3.5" cx="291.01785714285717" j="4"
                                                        val="39" barHeight="136.5" barWidth="13.535714285714286">
                                                    </path>
                                                    <rect id="SvgjsRect2639" width="13.535714285714286" height="140"
                                                        x="291.01785714285717" y="0" rx="5"
                                                        ry="5" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#F2F4F6"
                                                        class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath2640"
                                                        d="M 291.01785714285717 140L 291.01785714285717 22.5Q 291.01785714285717 17.5 296.01785714285717 17.5L 299.55357142857144 17.5Q 304.55357142857144 17.5 304.55357142857144 22.5L 304.55357142857144 22.5L 304.55357142857144 140L 304.55357142857144 140z"
                                                        fill="rgba(49,49,106,0.85)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskn6b0bl2d)"
                                                        pathTo="M 291.01785714285717 140L 291.01785714285717 22.5Q 291.01785714285717 17.5 296.01785714285717 17.5L 299.55357142857144 17.5Q 304.55357142857144 17.5 304.55357142857144 22.5L 304.55357142857144 22.5L 304.55357142857144 140L 304.55357142857144 140z"
                                                        pathFrom="M 291.01785714285717 140L 291.01785714285717 140L 304.55357142857144 140L 304.55357142857144 140L 304.55357142857144 140L 304.55357142857144 140L 304.55357142857144 140L 291.01785714285717 140"
                                                        cy="17.5" cx="345.16071428571433" j="5"
                                                        val="35" barHeight="122.5" barWidth="13.535714285714286">
                                                    </path>
                                                    <rect id="SvgjsRect2641" width="13.535714285714286" height="140"
                                                        x="345.16071428571433" y="0" rx="5"
                                                        ry="5" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#F2F4F6"
                                                        class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath2642"
                                                        d="M 345.16071428571433 140L 345.16071428571433 19Q 345.16071428571433 14 350.16071428571433 14L 353.6964285714286 14Q 358.6964285714286 14 358.6964285714286 19L 358.6964285714286 19L 358.6964285714286 140L 358.6964285714286 140z"
                                                        fill="rgba(49,49,106,0.85)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskn6b0bl2d)"
                                                        pathTo="M 345.16071428571433 140L 345.16071428571433 19Q 345.16071428571433 14 350.16071428571433 14L 353.6964285714286 14Q 358.6964285714286 14 358.6964285714286 19L 358.6964285714286 19L 358.6964285714286 140L 358.6964285714286 140z"
                                                        pathFrom="M 345.16071428571433 140L 345.16071428571433 140L 358.6964285714286 140L 358.6964285714286 140L 358.6964285714286 140L 358.6964285714286 140L 358.6964285714286 140L 345.16071428571433 140"
                                                        cy="14" cx="399.3035714285715" j="6"
                                                        val="36" barHeight="126" barWidth="13.535714285714286">
                                                    </path>
                                                </g>
                                                <g id="SvgjsG2628" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine2663" x1="0" y1="0" x2="379"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine2664" x1="0" y1="0" x2="379"
                                                y2="0" stroke-dasharray="0" stroke-width="0"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG2665" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG2666" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG2667" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <rect id="SvgjsRect2622" width="0" height="0" x="0"
                                            y="0" rx="0" ry="0" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                        <g id="SvgjsG2652" class="apexcharts-yaxis" rel="0"
                                            transform="translate(-18, 0)"></g>
                                        <g id="SvgjsG2616" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 70px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                        style="left: 238.266px; top: -19.0859px;">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Inter; font-size: 12px;">07 Fev</div>
                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                            style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgba(49, 49, 106, 0.85);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Inter; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label">Ventes: </span><span
                                                        class="apexcharts-tooltip-text-value">$ 36k</span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 404px; height: 141px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-sm-flex d-xl-block d-xxl-flex align-items-center">
                        <div class="col-12 col-sm-6 col-xl-12 col-xxl-6 px-xxl-0 mb-3 mb-sm-0 mb-xl-3 mb-xxl-0"
                            style="position: relative;">
                            <div id="chart-users" style="min-height: 140px;">
                                <div id="apexchartsx6nc0idk"
                                    class="apexcharts-canvas apexchartsx6nc0idk apexcharts-theme-light"
                                    style="width: 379px; height: 140px;"><svg id="SvgjsSvg2669" width="379"
                                        height="140" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG2671" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(0, 0)">
                                            <defs id="SvgjsDefs2670">
                                                <clipPath id="gridRectMaskx6nc0idk">
                                                    <rect id="SvgjsRect2677" width="387" height="144"
                                                        x="-4" y="-2" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskx6nc0idk">
                                                    <rect id="SvgjsRect2678" width="383" height="144"
                                                        x="-2" y="-2" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient2683" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop2684" stop-opacity="0.65"
                                                        stop-color="rgba(49,49,106,0.65)" offset="0"></stop>
                                                    <stop id="SvgjsStop2685" stop-opacity="0.5"
                                                        stop-color="rgba(152,152,181,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop2686" stop-opacity="0.5"
                                                        stop-color="rgba(152,152,181,0.5)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <line id="SvgjsLine2676" x1="264.8" y1="0" x2="264.8"
                                                y2="140" stroke="#b6b6b6" stroke-dasharray="3"
                                                class="apexcharts-xcrosshairs" x="264.8" y="0"
                                                width="1" height="140" fill="#b1b9c4" filter="none"
                                                fill-opacity="0.9" stroke-width="1"></line>
                                            <g id="SvgjsG2689" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG2690" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, 2.75)"></g>
                                            </g>
                                            <g id="SvgjsG2703" class="apexcharts-grid">
                                                <g id="SvgjsG2704" class="apexcharts-gridlines-horizontal"
                                                    style="display: none;">
                                                    <line id="SvgjsLine2706" x1="0" y1="0"
                                                        x2="379" y2="0" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2707" x1="0" y1="23.333333333333332"
                                                        x2="379" y2="23.333333333333332" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2708" x1="0" y1="46.666666666666664"
                                                        x2="379" y2="46.666666666666664" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2709" x1="0" y1="70"
                                                        x2="379" y2="70" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2710" x1="0" y1="93.33333333333333"
                                                        x2="379" y2="93.33333333333333" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2711" x1="0" y1="116.66666666666666"
                                                        x2="379" y2="116.66666666666666" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine2712" x1="0" y1="140"
                                                        x2="379" y2="140" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG2705" class="apexcharts-gridlines-vertical"
                                                    style="display: none;"></g>
                                                <line id="SvgjsLine2714" x1="0" y1="140"
                                                    x2="379" y2="140" stroke="transparent"
                                                    stroke-dasharray="0"></line>
                                                <line id="SvgjsLine2713" x1="0" y1="1"
                                                    x2="0" y2="140" stroke="transparent"
                                                    stroke-dasharray="0"></line>
                                            </g>
                                            <g id="SvgjsG2679" class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG2680" class="apexcharts-series" seriesName="Users"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath2687"
                                                        d="M 0 140L 0 93.33333333333326C 13.264999999999999 93.33333333333326 24.634999999999998 46.66666666666663 37.9 46.66666666666663C 51.165 46.66666666666663 62.535 116.66666666666663 75.8 116.66666666666663C 89.065 116.66666666666663 100.435 35 113.7 35C 126.965 35 138.335 93.33333333333326 151.6 93.33333333333326C 164.865 93.33333333333326 176.235 58.33333333333326 189.5 58.33333333333326C 202.765 58.33333333333326 214.135 35 227.4 35C 240.66500000000002 35 252.03500000000003 58.33333333333326 265.3 58.33333333333326C 278.565 58.33333333333326 289.935 58.33333333333326 303.2 58.33333333333326C 316.465 58.33333333333326 327.835 11.666666666666629 341.09999999999997 11.666666666666629C 354.36499999999995 11.666666666666629 365.735 70 379 70C 379 70 379 70 379 140M 379 70z"
                                                        fill="url(#SvgjsLinearGradient2683)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskx6nc0idk)"
                                                        pathTo="M 0 140L 0 93.33333333333326C 13.264999999999999 93.33333333333326 24.634999999999998 46.66666666666663 37.9 46.66666666666663C 51.165 46.66666666666663 62.535 116.66666666666663 75.8 116.66666666666663C 89.065 116.66666666666663 100.435 35 113.7 35C 126.965 35 138.335 93.33333333333326 151.6 93.33333333333326C 164.865 93.33333333333326 176.235 58.33333333333326 189.5 58.33333333333326C 202.765 58.33333333333326 214.135 35 227.4 35C 240.66500000000002 35 252.03500000000003 58.33333333333326 265.3 58.33333333333326C 278.565 58.33333333333326 289.935 58.33333333333326 303.2 58.33333333333326C 316.465 58.33333333333326 327.835 11.666666666666629 341.09999999999997 11.666666666666629C 354.36499999999995 11.666666666666629 365.735 70 379 70C 379 70 379 70 379 140M 379 70z"
                                                        pathFrom="M -1 700L -1 700L 37.9 700L 75.8 700L 113.7 700L 151.6 700L 189.5 700L 227.4 700L 265.3 700L 303.2 700L 341.09999999999997 700L 379 700">
                                                    </path>
                                                    <path id="SvgjsPath2688"
                                                        d="M 0 93.33333333333326C 13.264999999999999 93.33333333333326 24.634999999999998 46.66666666666663 37.9 46.66666666666663C 51.165 46.66666666666663 62.535 116.66666666666663 75.8 116.66666666666663C 89.065 116.66666666666663 100.435 35 113.7 35C 126.965 35 138.335 93.33333333333326 151.6 93.33333333333326C 164.865 93.33333333333326 176.235 58.33333333333326 189.5 58.33333333333326C 202.765 58.33333333333326 214.135 35 227.4 35C 240.66500000000002 35 252.03500000000003 58.33333333333326 265.3 58.33333333333326C 278.565 58.33333333333326 289.935 58.33333333333326 303.2 58.33333333333326C 316.465 58.33333333333326 327.835 11.666666666666629 341.09999999999997 11.666666666666629C 354.36499999999995 11.666666666666629 365.735 70 379 70"
                                                        fill="none" fill-opacity="1" stroke="#31316a"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="4"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskx6nc0idk)"
                                                        pathTo="M 0 93.33333333333326C 13.264999999999999 93.33333333333326 24.634999999999998 46.66666666666663 37.9 46.66666666666663C 51.165 46.66666666666663 62.535 116.66666666666663 75.8 116.66666666666663C 89.065 116.66666666666663 100.435 35 113.7 35C 126.965 35 138.335 93.33333333333326 151.6 93.33333333333326C 164.865 93.33333333333326 176.235 58.33333333333326 189.5 58.33333333333326C 202.765 58.33333333333326 214.135 35 227.4 35C 240.66500000000002 35 252.03500000000003 58.33333333333326 265.3 58.33333333333326C 278.565 58.33333333333326 289.935 58.33333333333326 303.2 58.33333333333326C 316.465 58.33333333333326 327.835 11.666666666666629 341.09999999999997 11.666666666666629C 354.36499999999995 11.666666666666629 365.735 70 379 70"
                                                        pathFrom="M -1 700L -1 700L 37.9 700L 75.8 700L 113.7 700L 151.6 700L 189.5 700L 227.4 700L 265.3 700L 303.2 700L 341.09999999999997 700L 379 700">
                                                    </path>
                                                    <g id="SvgjsG2681" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0">
                                                        <g class="apexcharts-series-markers">
                                                            <circle id="SvgjsCircle2720" r="0" cx="265.3"
                                                                cy="58.33333333333326"
                                                                class="apexcharts-marker wawm1rfck no-pointer-events"
                                                                stroke="#ffffff" fill="#31316a" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9"
                                                                default-marker-size="0"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG2682" class="apexcharts-datalabels" data:realIndex="0">
                                                </g>
                                            </g>
                                            <line id="SvgjsLine2715" x1="0" y1="0" x2="379"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine2716" x1="0" y1="0" x2="379"
                                                y2="0" stroke-dasharray="0" stroke-width="0"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG2717" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG2718" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG2719" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <rect id="SvgjsRect2675" width="0" height="0" x="0"
                                            y="0" rx="0" ry="0" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                        </rect>
                                        <g id="SvgjsG2702" class="apexcharts-yaxis" rel="0"
                                            transform="translate(-18, 0)"></g>
                                        <g id="SvgjsG2672" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 70px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                        style="left: 149.558px; top: 61.3333px;">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Inter; font-size: 12px;">08 Feb</div>
                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                            style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(49, 49, 106);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Inter; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label">Utilisateurs: </span><span
                                                        class="apexcharts-tooltip-text-value">550</span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 404px; height: 141px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                            {{-- boris <br>hejjj --}}
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    

        
    {{-- <div class="row g-3 mb-3">
            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Titre foncières récentes')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                            <div class="col-md-4 w-100">
                                <select class="form-select" wire:model="timeFrameTransactions">
                                    <option value="today">Aujourd'hui</option>
                                    <option value="yesterday">Hier</option>
                                    <option value="this_week">Cette semaine</option>
                                    <option value="last_week">La semaine dernière</option>
                                    <option value="last_month">Le mois dernier</option>
                                    <option value="last_year">L'année dernière</option>
                                </select>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentTransactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->description }}</td>
                                                <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Ventes récentes')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                            <div class="col-md-4 w-100">
                                <select class="form-select" wire:model="timeFrameSales">
                                    <option value="today">Aujourd'hui</option>
                                    <option value="yesterday">Hier</option>
                                    <option value="this_week">Cette semaine</option>
                                    <option value="last_week">La semaine dernière</option>
                                    <option value="last_month">Le mois dernier</option>
                                    <option value="last_year">L'année dernière</option>
                                </select>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Sale Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentSales as $sale)
                                            <tr>
                                                <td>
                                                    <a href="#" class="d-flex align-items-center">
                                                        <div
                                                            class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3">
                                                            <span
                                                                class="text-white">{{ initials($sale->user->first_name) }}</span>
                                                        </div>
                                                        <div class="d-block"><span
                                                                class="fw-bold">{{ $sale->user->first_name }}</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>{{ $sale->sales_amount }}</td>
                                                <td>{{ $sale->created_at->format('Y-m-d H:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Certificate Propriete')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                            <div class="col-md-4 w-100">
                                <select class="form-select" wire:model="timeFrameCertificateUpdates">
                                    <option value="today">Aujourd'hui</option>
                                    <option value="yesterday">Hier</option>
                                    <option value="this_week">Cette semaine</option>
                                    <option value="last_week">La semaine dernière</option>
                                    <option value="last_month">Le mois dernier</option>
                                    <option value="last_year">L'année dernière</option>
                                </select>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentCertificateUpdates as $update)
                                            <tr>
                                                <td>{{ $update->description }}</td>
                                                <td>{{ $update->created_at->format('Y-m-d H:i:s') }}</td>
                                            </tr>
                                        @empty
                                            <div>no record found</div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
          
    
        </div> --}}



    <div class='mt-5'>
        <div class='d-flex justify-content-between align-items-end mx-2'>
            <h5 class="h5">{{ __('Dernière connexion') }}</h5>
            <div>
                <a href='{{ route('portal.auditlogs.index') }}' class='btn btn-primary'>{{ __('Tout voir') }}</a>
            </div>
        </div>
        <div class="card mt-2">
            <div class="table-responsive text-gray-700">
                <table class="table employee-table table-hover align-items-center ">
                    <thead>
                        <tr>
                            <th class="border-bottom">{{ __('Employé') }}</th>
                            <th class="border-bottom">{{ __('Type Action') }}</th>
                            <th class="border-bottom">{{ __('Action effectuée') }}</th>
                            <th class="border-bottom">{{ __('Date creation') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td>
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3">
                                            <span class="text-white">{{ initials($log->user) }}</span>
                                        </div>
                                        <div class="d-block"><span class="fw-bold">{{ $log->user }}</span>
                                            <div class="small text-gray">{{ $log->user }}</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <span
                                        class="fw-normal badge super-badge p-2 bg-{{ $log->style }} rounded">{{ $log->action_type }}</span>
                                </td>
                                <td>
                                    <span class="fs-normal">{!! $log->action_perform !!}</span>
                                </td>
                                <td>
                                    <span class="fw-normal">{{ $log->created_at->format('Y-m-d') }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="text-center text-gray-800 mt-2">
                                        <h4 class="fs-4 fw-bold">{{ __('Opps rien ici') }} &#128540;</h4>
                                        <p>{{ __('Aucun enregistrement trouvé..!') }}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</div>

