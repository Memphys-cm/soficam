<div>
    <div class='pb-3'>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-0 align-items-center">
            <div class="mb-lg-0">

                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <div>
                        <span class="text-secondary">{{__('Welcome')}},</span> <span class="h5 ">{{auth()->user()->name}}</span>
                    </div>
                </h1>
                <p class="mt-n2">{{__('Manage companies and their related details')}} &#128524;</p>
            </div>
            <div class="d-flex justify-content-between">
                 {{\Str::upper(\Str::random(5))."". now()->format('msu')}} <br>
            </div>
        </div>
    </div>
    <h4>Statistiques globales</h4>

        <div class="card py-3 mb-3">
            <div class="card-body py-3">
                <div class="row g-0">
                    <div class="col-6 col-md-4 pb-4">
                        <h6 class="pb-1 text-700">Nombre total de titres fonciers enregistrés. </h6>
                        <p class="font-sans-serif lh-1 fs-4">{{$all_titres_fonciers}} {{__('TF')}}</p>    
                    </div>
                   
                    <div class="col-6 col-md-4   pb-4 pt-4 pt-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">Nombre total de lotissements</h6>
                        <p class="font-sans-serif lh-1 fs-4">{{$all_lotissement}} {{__('')}}</p>         
                    </div>
                    <div class="col-6 col-md-4   pb-4 ps-3">
                        <h6 class="pb-1 text-700">Nombre total de notaires enregistrés </h6>
                        <p class="font-sans-serif lh-1 fs-4">{{$all_notaire_membre}} {{__('Membre')}}</p> 
                    </div>
                    <div class="col-6 col-md-4    pt-4 pb-md-0 ps-3 ps-md-0">
                        <h6 class="pb-1 text-700">Nombre de ventes conclues </h6>
                        <div class="col">
                            <p class="font-sans-serif lh-1 fs-4">{{$allsales}} {{'Ventes'}}</p>
                        </div>
                        
                    </div>
                    <div class="col-6 col-md-4  pt-4 pb-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">Somme totale des transactions effectuées. </h6>
                        <p class="font-sans-serif lh-1 fs-4">{{$totalPaidAmount}} {{__('XAF')}}</p>

                       
                    </div>
                    <div class="col-6 col-md-4 pb-0 pt-4 ps-3">
                        <h6 class="pb-1 text-700">Nombre total de cabinets de notaire enregistrés  </h6>
                        <p class="font-sans-serif lh-1 fs-4">{{$all_cabinet_notaire}} {{__('Cabinet')}}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <h4>Activité récente</h4>

      
        

        <div class="row g-3 mb-3">
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
          
    
        </div>
       


    <div class='mt-5'>
        <div class='d-flex justify-content-between align-items-end mx-2'>
            <h5 class="h5">{{__("Lastest Audit logs")}}</h5>
            <div>
                <a href='{{route("portal.auditlogs.index")}}' class='btn btn-primary'>{{__("View all")}}</a>
            </div>
        </div>
        <div class="card mt-2">
            <div class="table-responsive text-gray-700">
                <table class="table employee-table table-hover align-items-center ">
                    <thead>
                        <tr>
                            <th class="border-bottom">{{__('Employee')}}</th>
                            <th class="border-bottom">{{__('Action Type')}}</th>
                            <th class="border-bottom">{{__('Action Performed')}}</th>
                            <th class="border-bottom">{{__('Date created')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                        <tr>
                            <td>
                                <a href="#" class="d-flex align-items-center">
                                    <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-primary me-3"><span class="text-white">{{initials($log->user)}}</span></div>
                                    <div class="d-block"><span class="fw-bold">{{$log->user}}</span>
                                        <div class="small text-gray">{{$log->user}}</div>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="fw-normal badge super-badge p-2 bg-{{$log->style}} rounded">{{$log->action_type}}</span>
                            </td>
                            <td>
                                <span class="fs-normal">{!! $log->action_perform !!}</span>
                            </td>
                            <td>
                                <span class="fw-normal">{{$log->created_at->format('Y-m-d')}}</span>
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

            </div>
        </div>
    </div>
</div>