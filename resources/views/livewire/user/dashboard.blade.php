<x-layouts.user.master>
    <div class='container pt-3 pt-lg-4 pb-7 pb-lg-9 text-white'>
        <div class='d-flex flex-wrap-reverse align-items-top  justify-content-md-between '>
            <div class='d-flex flex-wrap align-items-center gap-3'>
                <div class='d-none d-md-block d-lg-block'>
                    <div class="avatar-xl d-flex align-items-center justify-content-center fw-bold rounded border-warn  mr-5">
                        <span class="p-2 display-2 text-secondary">{{auth()->user()->initials}}</span>
                    </div>
                </div>
                <div class=''>
                    <div class='fw-bold display-4 text-gray-600'>{{__('Hi')}}, {{auth()->user()->first_name}}</div>
                    <div class='d-flex align-items-center justify-content-start '>
                        <div class='leading text-gray-400 '>{{ auth()->user()->service ? auth()->user()->service->name : __('No Service')}}</div>
                    </div>
                    <div class='mt-4 d-flex flex-wrap   align-items-center gap-2'>
                        <a href="{{ route('user.suivi-dossier.index') }}" class="btn btn-secondary mr-lg-2 ">
                            <svg class="icon icon-sm me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" strokelinejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            {{ __('Suivi Dossier') }}
                        </a>

                        <a href="{{ route('user.taxfonciere.index') }}" class='btn btn-outline-primary mr-lg-2'>
                            <svg class="icon icon-sm me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ __('Taxe Foncière') }}
                        </a>
                        <a href="{{ route('user.paiement') }}" class='btn btn-outline-tertiary'>
                            <svg class="icon icon-sm me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ __('Paiement') }}
                        </a>

                    </div>
                </div>
            </div>
            <div>
                <x-navigation.user-nav />
            </div>
        </div>

        <div class='mt-5'>
            <div class='d-flex justify-content-between align-items-end mx-2'>
                <h5 class="h5 text-gray-600">{{__("Lastest Audit logs")}}</h5>
                <div>
                    <a href='{{route("user.auditlogs")}}' class='btn btn-secondary'>{{__("View all")}}</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="table-responsive text-gray-700">
                    <table class="table employee-table table-hover align-items-center ">
                        <thead>
                            <tr>
                                <!-- <th class="border-bottom">{{__('Employee')}}</th> -->
                                <th class="border-bottom">{{__('Action Type')}}</th>
                                <th class="border-bottom">{{__('Action Performed')}}</th>
                                <th class="border-bottom">{{__('Date')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                            <tr>
                                <!-- <td>
                                    <a href="#" class="d-flex align-items-center">
                                        <div class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-secondary me-3"><span class="text-white">{{initials($log->user)}}</span></div>
                                        <div class="d-block"><span class="fw-bold">{{$log->user}}</span>
                                            <div class="small text-gray">{{$log->user}}</div>
                                        </div>
                                    </a>
                                </td> -->
                                <td>
                                    <span class="fw-normal badge super-badge badge-lg bg-{{$log->style}} rounded">{{$log->action_type}}</span>
                                </td>
                                <td>
                                    <span class="fs-normal">{!! $log->action_perform !!}</span>
                                </td>
                                <td>
                                    <span class="fw-normal">{{$log->created_at}}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="text-center text-gray-800 mt-2">
                                        <h4 class="fs-4 fw-bold">{{__('Liste vide')}}</h4>
                                        <p>{{__('Aucun enregistrement trouvé..!')}}</p>
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
    <div class="pb-lg-6 bg-transparent" style="padding-left: 5vh;border:1px solid grey; width:20%; border-radius:10px; position:absolute;left:9%">

        <div class="mb-3 pt-5   ">
            <a href="{{ route('user.suivi-dossier.index') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-file-earmark" viewBox="0 0 16 16">
                    <path
                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                </svg> {{ __('Suivi Dossier') }}
            </a>
        </div>
        <div class="mb-3">
            <a href="{{ route('user.taxfonciere.index') }}" wire:click="count"class="btn btn-primary">
                <svg class="icon icon-xs" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none"
                        d="M18.665,4.784H1.335c-0.479,0-0.866,0.388-0.866,0.866v8.665c0,0.479,0.388,0.866,0.866,0.866h17.33c0.479,0,0.866-0.388,0.866-0.866V5.65C19.531,5.172,19.144,4.784,18.665,4.784 M1.769,5.65c0.239,0,0.433,0.194,0.433,0.434S2.008,6.517,1.769,6.517c-0.24,0-0.434-0.193-0.434-0.433S1.529,5.65,1.769,5.65 M1.769,14.315c-0.24,0-0.434-0.194-0.434-0.434s0.194-0.433,0.434-0.433c0.239,0,0.433,0.193,0.433,0.433S2.008,14.315,1.769,14.315 M18.231,14.315c-0.239,0-0.433-0.194-0.433-0.434s0.193-0.433,0.433-0.433c0.24,0,0.434,0.193,0.434,0.433S18.472,14.315,18.231,14.315M18.665,12.662c-0.136-0.049-0.281-0.08-0.434-0.08c-0.718,0-1.3,0.583-1.3,1.3c0,0.152,0.031,0.298,0.08,0.434H2.989c0.048-0.136,0.08-0.281,0.08-0.434c0-0.717-0.583-1.3-1.3-1.3c-0.153,0-0.297,0.031-0.434,0.08V7.304c0.136,0.048,0.281,0.079,0.434,0.079c0.717,0,1.3-0.582,1.3-1.299c0-0.153-0.032-0.297-0.08-0.434h14.023c-0.049,0.136-0.08,0.281-0.08,0.434c0,0.718,0.582,1.299,1.3,1.299c0.152,0,0.298-0.031,0.434-0.079V12.662z M18.231,6.517c-0.239,0-0.433-0.193-0.433-0.433s0.193-0.434,0.433-0.434c0.24,0,0.434,0.194,0.434,0.434S18.472,6.517,18.231,6.517 M5.235,6.517H4.368c-0.24,0-0.433,0.194-0.433,0.433c0,0.24,0.193,0.433,0.433,0.433h0.867c0.239,0,0.433-0.193,0.433-0.433C5.668,6.711,5.474,6.517,5.235,6.517 M15.632,12.582h-0.866c-0.239,0-0.433,0.194-0.433,0.434s0.193,0.434,0.433,0.434h0.866c0.239,0,0.434-0.194,0.434-0.434S15.871,12.582,15.632,12.582 M10,6.517c-1.914,0-3.465,1.552-3.465,3.466c0,1.915,1.552,3.466,3.465,3.466c1.914,0,3.467-1.552,3.467-3.466C13.467,8.069,11.914,6.517,10,6.517 M11.795,9.474c-0.059,0.4-0.279,0.593-0.571,0.661c0.401,0.21,0.606,0.534,0.411,1.093c-0.241,0.694-0.815,0.753-1.579,0.607l-0.185,0.747L9.423,12.47l0.183-0.737c-0.116-0.028-0.234-0.06-0.356-0.093l-0.184,0.74l-0.447-0.111l0.185-0.749c-0.104-0.027-0.211-0.056-0.319-0.083l-0.582-0.146l0.222-0.516c0,0,0.33,0.088,0.325,0.082c0.127,0.032,0.183-0.051,0.205-0.107l0.292-1.18C8.964,9.573,8.98,9.578,8.995,9.581C8.978,9.573,8.961,9.569,8.949,9.566l0.208-0.842C9.163,8.627,9.13,8.507,8.949,8.461c0.006-0.004-0.325-0.082-0.325-0.082l0.119-0.48L9.36,8.054v0.002c0.092,0.023,0.188,0.045,0.285,0.067l0.184-0.74l0.447,0.113l-0.18,0.725c0.121,0.027,0.241,0.056,0.359,0.085l0.177-0.721l0.449,0.112l-0.184,0.74C11.464,8.634,11.876,8.928,11.795,9.474 M9.976,8.753L9.753,9.652c0.252,0.064,1.032,0.322,1.158-0.187C11.042,8.935,10.229,8.816,9.976,8.753 M9.641,10.106l-0.246,0.991c0.303,0.076,1.239,0.378,1.377-0.181C10.917,10.333,9.944,10.183,9.641,10.106">
                    </path>
                </svg> {{ __('Taxe Foncière')}} ({{ $element }})
            </a>
        </div>
        <div>
            <a href="{{ route('user.paiement') }}" class="btn btn-primary">
                <svg class="icon icon-xs" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none"
                        d="M18.665,4.784H1.335c-0.479,0-0.866,0.388-0.866,0.866v8.665c0,0.479,0.388,0.866,0.866,0.866h17.33c0.479,0,0.866-0.388,0.866-0.866V5.65C19.531,5.172,19.144,4.784,18.665,4.784 M1.769,5.65c0.239,0,0.433,0.194,0.433,0.434S2.008,6.517,1.769,6.517c-0.24,0-0.434-0.193-0.434-0.433S1.529,5.65,1.769,5.65 M1.769,14.315c-0.24,0-0.434-0.194-0.434-0.434s0.194-0.433,0.434-0.433c0.239,0,0.433,0.193,0.433,0.433S2.008,14.315,1.769,14.315 M18.231,14.315c-0.239,0-0.433-0.194-0.433-0.434s0.193-0.433,0.433-0.433c0.24,0,0.434,0.193,0.434,0.433S18.472,14.315,18.231,14.315M18.665,12.662c-0.136-0.049-0.281-0.08-0.434-0.08c-0.718,0-1.3,0.583-1.3,1.3c0,0.152,0.031,0.298,0.08,0.434H2.989c0.048-0.136,0.08-0.281,0.08-0.434c0-0.717-0.583-1.3-1.3-1.3c-0.153,0-0.297,0.031-0.434,0.08V7.304c0.136,0.048,0.281,0.079,0.434,0.079c0.717,0,1.3-0.582,1.3-1.299c0-0.153-0.032-0.297-0.08-0.434h14.023c-0.049,0.136-0.08,0.281-0.08,0.434c0,0.718,0.582,1.299,1.3,1.299c0.152,0,0.298-0.031,0.434-0.079V12.662z M18.231,6.517c-0.239,0-0.433-0.193-0.433-0.433s0.193-0.434,0.433-0.434c0.24,0,0.434,0.194,0.434,0.434S18.472,6.517,18.231,6.517 M5.235,6.517H4.368c-0.24,0-0.433,0.194-0.433,0.433c0,0.24,0.193,0.433,0.433,0.433h0.867c0.239,0,0.433-0.193,0.433-0.433C5.668,6.711,5.474,6.517,5.235,6.517 M15.632,12.582h-0.866c-0.239,0-0.433,0.194-0.433,0.434s0.193,0.434,0.433,0.434h0.866c0.239,0,0.434-0.194,0.434-0.434S15.871,12.582,15.632,12.582 M10,6.517c-1.914,0-3.465,1.552-3.465,3.466c0,1.915,1.552,3.466,3.465,3.466c1.914,0,3.467-1.552,3.467-3.466C13.467,8.069,11.914,6.517,10,6.517 M11.795,9.474c-0.059,0.4-0.279,0.593-0.571,0.661c0.401,0.21,0.606,0.534,0.411,1.093c-0.241,0.694-0.815,0.753-1.579,0.607l-0.185,0.747L9.423,12.47l0.183-0.737c-0.116-0.028-0.234-0.06-0.356-0.093l-0.184,0.74l-0.447-0.111l0.185-0.749c-0.104-0.027-0.211-0.056-0.319-0.083l-0.582-0.146l0.222-0.516c0,0,0.33,0.088,0.325,0.082c0.127,0.032,0.183-0.051,0.205-0.107l0.292-1.18C8.964,9.573,8.98,9.578,8.995,9.581C8.978,9.573,8.961,9.569,8.949,9.566l0.208-0.842C9.163,8.627,9.13,8.507,8.949,8.461c0.006-0.004-0.325-0.082-0.325-0.082l0.119-0.48L9.36,8.054v0.002c0.092,0.023,0.188,0.045,0.285,0.067l0.184-0.74l0.447,0.113l-0.18,0.725c0.121,0.027,0.241,0.056,0.359,0.085l0.177-0.721l0.449,0.112l-0.184,0.74C11.464,8.634,11.876,8.928,11.795,9.474 M9.976,8.753L9.753,9.652c0.252,0.064,1.032,0.322,1.158-0.187C11.042,8.935,10.229,8.816,9.976,8.753 M9.641,10.106l-0.246,0.991c0.303,0.076,1.239,0.378,1.377-0.181C10.917,10.333,9.944,10.183,9.641,10.106">
                    </path>
                </svg> {{ __('Paiement') }}
            </a>
        </div>



    </div>
    @section('scripts')

    @endsection
</x-layouts.user.master>