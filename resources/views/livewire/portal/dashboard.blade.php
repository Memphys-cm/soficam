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

        <div class="row g-3 mb-3">
            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de TF enregistrés')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                            <p class="font-sans-serif lh-1 fs-4">{{$all_titres_fonciers}} {{__('TF')}}</p>    

                        </div>
                        <div class="">
                            <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                            </svg>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de lotissements')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{$all_lotissement}}</p>
                        </div>
                        <div class="">
                            <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z" />
                            </svg>
                           
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de cabinets de notaire')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                        <p class="font-sans-serif lh-1 fs-4">{{$all_cabinet_notaire}} {{__('Cabinet')}}</p>
                        </div>
                        <div class="">
                            <svg class="icon text-info " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                           
                        </div>
                    </div>
                </div>
            </div>
           
    
        </div>

        <div class="row g-3 mb-3">
            
           
           
            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre de ventes conclues')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                            <p class="font-sans-serif lh-1 fs-4">{{$allsales}} {{'Ventes'}}</p>
                        </div>
                        <div class="">
                            <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Somme totale des transactions')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                            <p class="font-sans-serif lh-1 fs-4">{{$totalPaidAmount}} {{__('XAF')}}</p>    

                        </div>
                        <div class="">
                            <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                            </svg>
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-4">
                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Nombre total de notaires enregistrés')}}</h6>
                    </div>
                    <div class="p-3 d-flex justify-content-between align-iterms-center">
                        <div class="col">
                            <p class="font-sans-serif lh-1 fs-4">{{$all_notaire_membre}} {{__('Notaire')}}</p>
                        </div>
                        <div class="">
                            <svg class="icon text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>

        <h4>Activité récente</h4>

        

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