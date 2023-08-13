<div>
    <x-alert />
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
                    {{__('Simple Sales Managment')}}
                </h1>
                <p class="mt-n1 mx-2">{{__('View all Simple Sales within the application')}} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">


            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{__('Search')}}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{__('Search...')}}" class="form-control">
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
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-hover table-bordered align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{__('Code')}}</th>
                        <th class="border-bottom">{{__('Land title Number')}}</th>
                        <th class="border-bottom">{{__('Location')}}</th>
                        <th class="border-bottom">{{__('Details')}}</th>
                        <th class="border-bottom">{{__('Contacts')}}</th>
                        <th class="border-bottom">{{__('Date ')}}</th>
                        @canany('lotissement.sale')
                        <th class="border-bottom">{{__('Action')}}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($lotissements as $lotissement)
                    <tr>
                        <td>
                            <span class="fw-normal">{{$lotissement->code}}</span>
                        </td>
                        <td>
                            <a href="#" class="d-flex align-items-center">
                                <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3"><span class="text-white">#{{initials($lotissement->titreFoncier->numero_titre_foncier)}}</span></div>
                                <div class="d-block">
                                    <span class="fw-bolder">No. {{$lotissement->titreFoncier->numero_titre_foncier}}</span>
                                    <div class="small text-gray align-items-center"><span class="fw-bold">{{!empty($lotissement->titreFoncier) ? $lotissement->titreFoncier->date_de_delivrance_du_TF : ''}} </span>| @if(!empty($lotissement->titreFoncier)) <span class="fw-light badge badge-md bg-{{$lotissement->titreFoncier->EtatTFStyle}} rounded-1 ">{{$lotissement->titreFoncier->etat_TF}}</span>@endif</div>
                                </div>
                            </a>
                        </td>
                        <td class="text-center">
                            @if(!empty($lotissement->titreFoncier))
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Region')}} : <span class="fw-bolder mx-2"> {{$lotissement->titreFoncier->region->region_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Division')}} : <span class="fw-bolder mx-2"> {{$lotissement->titreFoncier->division->division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Sub Divi')}} : <span class="fw-bolder mx-2"> {{$lotissement->titreFoncier->subDivision->sub_division_name}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Lieu Dit')}} : <span class="fw-bolder mx-2"> {{$lotissement->titreFoncier->lieu_dit}} </span>
                            </div>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Blocks')}} : <span class="fw-bolder mx-2"> {{$lotissement->blocks_count}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Lots')}} : <span class="fw-bolder mx-2"> {{$lotissement->parcels_count}} </span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('AI')}} : <span class="fw-bolder mx-2"> {{$lotissement->agent_immobiliere}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('PI')}} : <span class="fw-bolder mx-2"> {{$lotissement->promoteur_immobiliere}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('LS')}} : <span class="fw-bolder mx-2"> {{$lotissement->lotisseur}} </span>
                            </div>
                            <div class="d-flex align-items-centerpy-1">
                                {{__('Ur')}} : <span class="fw-bolder mx-2"> {{$lotissement->urbaniste}} </span>
                            </div>
                        </td>

                        <td>
                            <span class="fw-normal">{{$lotissement->created_at->format('Y-m-d')}}</span>
                        </td>
                        @can('lotissement.sale')
                        <td>
                            @can('lotissement.sale')
                            <a href="{{route('portal.lotissements.simple-sale',['lotissement_id'=>$lotissement->id])}}">
                                <svg class="icon icon-sm text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>
                            </a>

                            @endcan

                        </td>
                        @endcan
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="text-center text-gray-800 mt-2">
                                <h4 class="fs-4 fw-bold">{{__('Opps nothing here')}} &#128540;</h4>
                                <p>{{__('You need to create lotissement before you can perform simple sales!')}}</p>
                                @can('lotissement.create')
                                <a href="{{route('portal.lotissements.create')}}" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg> {{__('Add a Lotissement')}}
                                </a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{__('Showing')}} {{$perPage > $lotissements_count ? $lotissements_count : $perPage  }} {{__('items of')}} {{$lotissements_count}}
                </div>
                {{ $lotissements->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $('#CreatesimplesalesaleModal').modal('hide');
        $('#DeleteModal').modal('hide');
    });
</script>
@endpush