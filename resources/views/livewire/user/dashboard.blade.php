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
                    <div class='fw-bold display-4 text-gray-600'>{{__('Bonjour')}}, {{auth()->user()->first_name}}</div>
                    <div class='d-flex align-items-center justify-content-start '>
                        <div class='leading text-gray-400 '>{{ auth()->user()->company ? auth()->user()->company->name : __('No Company')}} | {{ auth()->user()->department ? auth()->user()->department->name : __('No Department')}}</div>
                    </div>

                </div>
            </div>
            <div>
                <x-navigation.user-nav />
            </div>
        </div>

        <div class='my-5'>
            <div class=''>
                <x-alert />
                @include('flash::message')
            </div>
        </div>
        <div class='mt-5'>
            <div class='d-flex justify-content-between align-items-end mx-2'>
                <h5 class="h5 text-gray-600">{{__("Dernière connexion")}}</h5>
                <div>
                    <a href='{{route("user.auditlogs")}}' class='btn btn-secondary'>{{__("Tout Voir")}}</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="table-responsive text-gray-700">
                    <table class="table employee-table table-hover align-items-center ">
                        <thead>
                            <tr>
                                <!-- <th class="border-bottom">{{__('Employee')}}</th> -->
                                <th class="border-bottom">{{__('Type d\'action')}}</th>
                                <th class="border-bottom">{{__('Action réalisée')}}</th>
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
                                        <h4 class="fs-4 fw-bold">{{__('Opps rien ici')}} &#128540;</h4>
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
    @section('scripts')

    @endsection
</x-layouts.user.master>