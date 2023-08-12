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
                        <li class="breadcrumb-item "><a href="{{route('portal.lotissements.index')}}">{{__('Lotissements')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Sale Lot')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-2 '>
            <div class="card p-3 mb-3">
                <h5 class="w-auto">{{__('Simple Sale')}}</h5>
                <ul>
                    <li>{{__('Update Land information')}}</li>
                    <li>{{__('Update Promoter information')}}</li>
                </ul>
            </div>
            <div class="card p-3">
                <h5 class="w-auto">{{__('Simple Sale')}}</h5>
                <ul>
                    <li>{{__('Update Land information')}}</li>
                    <li>{{__('Update Promoter information')}}</li>
                </ul>
            </div>
        </div>
        <div class='col-md-10'>
            <div class="card p-3 mb-3">
                <legend class="w-auto">Informations on the Land</legend>
                <div class='d-flex justify-content-between me-2'>
                    <div>
                        <a href="#" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex ">
                                <div class="avatar avatar-md d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3">
                                    <span class="text-white">#{{initials($lotissement->titreFoncier->numero_titre_foncier)}}</span>
                                </div>
                                <div class="d-block">
                                    <span class="fw-bolder">No. {{$lotissement->titreFoncier->numero_titre_foncier}}</span>
                                    <div class="small text-gray ">
                                        <span class="fw-bold d-flex align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-xxs me-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                            </svg>{{!empty($lotissement->titreFoncier) ? $lotissement->titreFoncier->date_de_delivrance_du_TF : ''}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($lotissement->titreFoncier)) <span class="fw-light badge badge-md bg-{{$lotissement->titreFoncier->EtatTFStyle}} rounded-1 ">{{$lotissement->titreFoncier->etat_TF}}</span>@endif
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
                                        <label class="mb-0" style="font-size: small;">{{__('Total SA')}}</label>
                                        <h6 class="mb-0" style="font-size: small;">{{number_format($lotissement->titreFoncier->superficie_du_TF_mere * 0.0001, 2)}} ha</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center ">
                                    <div class="icon-shape icon-xs icon-shape-purple rounded me-2">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                        </svg>
                                    </div>
                                    <div class="d-block">
                                        <label class="mb-0" style="font-size: small;">Sessions</label>
                                        <h6 class="mb-0" style="font-size: small;">9,567</h6>
                                    </div>
                                </div>
                            </div>
                            <div class=''>
                                {{__('Coordinates')}} : {{$lotissement->titreFoncier->coordonnees}}
                            </div>

                            <!-- {{$lotissement->titreFoncier->superficie_du_TF_mere}}
                            {{$lotissement->titreFoncier->superficie_vendue_du_TF_mere}}
                            {{$lotissement->titreFoncier->superficie_restant_du_TF_mere}} -->

                        </div>
                        @if(!empty($lotissement->titreFoncier))
                        <div class="d-flex align-items-center">
                            {{__('Location')}} : <span class="fw-bold mx-2"> {{$lotissement->titreFoncier->region->region_name}} > {{$lotissement->titreFoncier->division->division_name}} > {{$lotissement->titreFoncier->subDivision->sub_division_name}} > {{$lotissement->titreFoncier->lieu_dit}} </span>
                        </div>
                        @endif
                    </div>
                    <div>
                        <h4 class="fs-5">{{__('Owners')}}</h4>
                        @if(!empty($lotissement->titreFoncier))
                        @foreach($lotissement->titreFoncier->users as $key=>$option)
                        <a href="#" class="d-flex align-items-center {{!$loop->last ? 'border-bottom' : ''}} py-1">
                            <div class="avatar  d-flex align-items-center justify-content-center fw-bold  rounded bg-primary me-2"><span class="text-white" style="font-size: small;">{{$option->initials}}</span></div>
                            <div class="d-block">
                                <span class="fw-bold " style="font-size: small;">{{ucwords($option->name)}}</span>
                                <div class="small text-gray" style="font-size: x-small;">
                                    <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg> {{$option->email}}
                                    <svg class="icon icon-xxs me-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg> {{$option->primary_phone_number}}
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card p-4 ">
                <legend class="w-auto">{{__('Blocks and Lots')}}</legend>

                @foreach($lotissement->blocks as $block)
                <div class='mb-3'>
                    @if(!empty($block->parcels->where('date_de_vente', null)->where('type','normale')))
                    <span class="fw-bold pb-3"> {{__('Block Name')}} : {{$block->block_name}}</span>

                    <div class='d-flex justify-content-between border border-1 fw-bold px-3 mt-1'>
                        <span>{{__('Numero Lot')}}</span>
                        <span>{{__('Superficie Total')}}</span>
                        <span>{{__('Statut Lot')}}</span>
                        <span>{{__('Action')}}</span>
                    </div>
                    @endif
                    @foreach($block->parcels->where('date_de_vente', null)->where('type','normale') as $lot)
                    @if(!empty($lot))
                    <div class='d-flex justify-content-between align-items-baseline border border-1 px-3 '>
                        <span class="py-1 text-center">{{$lot->numero_du_lot}}</span>
                        <span class="py-1 text-center">{{$lot->surperficie_du_lot}}</span>
                        <span class="py-1 text-center">{{$lot->statut_du_lot}}</span>
                        <span class="py-1text-center">
                            <a href="">
                                <svg class="icon icon-sm text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>
                            </a>
                        </span>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>