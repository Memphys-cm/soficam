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
                        <a href="{{ route('user.paiement') }}" class='btn btn-primary'>
                            <svg class="icon icon-sm me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ __('Paiement') }}
                        </a>
                        <a href="{{ route('user.suivi-dossier.index') }}" class="btn btn-outline-secondary mr-lg-2 ">
                            <svg class="icon icon-sm me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" strokelinejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            {{ __('Suivi Dossier') }}
                        </a>
                        <a href="{{ route('user.taxfonciere.index') }}" class='btn btn-outline-tertiary mr-lg-2'>
                            <svg class="icon icon-sm me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ __('Taxe Foncière') }}
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
    @section('scripts')

    @endsection
</x-layouts.user.master>