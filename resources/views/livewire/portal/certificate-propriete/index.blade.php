<div>
    <x-alert />
    @include('livewire.portal.certificate-propriete.create')
    @include('livewire.portal.certificate-propriete.update')

    <x-delete-modal />
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
                        <li class="breadcrumb-item"><a href="/">{{__('Tableau de bord')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Demande de Certificat de Propriété') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Demande de Certificat de Propriété') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Afficher toutes les demandes de certificat de propriété dans l\'application') }}</p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('certificate_propriete.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreatecertificateproprieteModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{ __('Nouveau') }}
                </a>
                @endcan

                @can('certificate_propriete.export_n_print')
                <div class="mx-2" wire:loading.remove>
                    <a wire:click="export()" class="btn btn-sm btn-gray-500  py-2 d-inline-flex align-items-center ">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        {{ __('Exporter') }}
                    </a>
                </div>
                <div class="text-center mx-2" wire:loading wire:target="export">
                    <div class="text-center">
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status">
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>

    <x-alert />

    <div class="row p-3">
        <div class="col-md-3">
            <label for="search">{{ __('Recherche') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Recherche...') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{ __('Trier par') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="titre_foncier_id">{{ __('Titre Foncier') }}</option>
                <option value="certificate_proprietes_number">{{ __('Numéro CP') }}</option>
                <option value="requestor_id">{{ __('Requérant') }}</option>
                <option value="price">{{ __('Prix') }}</option>
                <option value="validity">{{ __('Validité') }}</option>
                <option value="status">{{ __('Statut') }}</option>
                <option value="created_at">{{ __('Date Création ') }}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="direction">{{ __('Sens du tri') }}: </label>
            <select wire:model="orderAsc" id="direction" class="form-select">
                <option value="asc">{{ __('Ascendant') }}</option>
                <option value="desc">{{ __('Descendant') }}</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="perPage">{{ __('Elements par page') }}: </label>
            <select wire:model="perPage" id="perPage" class="form-select">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
        </div>
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('REQUÉRANT') }}</th>
                        <th class="border-bottom">{{ __('TITRE FONCIER') }}</th>
                        <th class="border-bottom">{{ __('NUMÉRO CP') }}</th>
                        <th class="border-bottom">{{ __('PRIX') }}</th>
                        <th class="border-bottom">{{ __('VALIDITÉ') }}</th>
                        <th class="border-bottom">{{ __('TYPE DE PERSONNE') }}</th>
                        <th class="border-bottom">{{ __('STATUT') }}</th>
                        <th class="border-bottom">{{ __('DATE DE CRÉATION') }}</th>
                        @canany(['certificate_propriete.edit','certificate_propriete.delete'])
                        <th class="border-bottom">{{ __('ACTION') }}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($certificateproprietes as $certificatepropriete)
                    <tr>
                        <td>
                            <x-elements.user :options="$certificatepropriete->requestor" />

                        </td>
                        <td>{{ !empty($certificatepropriete->titreFoncier) ? $certificatepropriete->titreFoncier->numero_titre_foncier : '' }}</td>
                        <td>{{ $certificatepropriete->certificate_proprietes_number }}</td>

                        <td>{{ $certificatepropriete->price }}</td>
                        <td>{{ $certificatepropriete->validity }}</td>
                        <td>{{ $certificatepropriete->certificate_proprietes_type }}</td>

                        <td>

                            <span class="fw-normal badge super-badge p-2 bg-{{$certificatepropriete->statusStyle}} round">{{$certificatepropriete->status}}</span>

                        </td>
                        <td>{{ $certificatepropriete->created_at }}</td>
                        @canany(['certificate_propriete.edit','certificate_propriete.delete'])
                        <td>
                            @can('certificate_propriete.update')
                            @if($certificatepropriete->status === 'active')
                            <a href="#" wire:click.prevent='printPdf({{$certificatepropriete->id}})' title="Imprimer le document">
                                <svg class="icon icon-sm text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                </svg>
                            </a>
                            @endif
                            @endcan
                            @if($certificatepropriete->status === 'active')
                            <a href="#" title="Notifier" wire:click.prevent='sms({{$certificatepropriete->id}})'>
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.38,3.467l0.232-0.633c0.086-0.226-0.031-0.477-0.264-0.559c-0.229-0.081-0.48,0.033-0.562,0.262l-0.234,0.631C10.695,2.38,7.648,3.89,6.616,6.689l-1.447,3.93l-2.664,1.227c-0.354,0.166-0.337,0.672,0.035,0.805l4.811,1.729c-0.19,1.119,0.445,2.25,1.561,2.65c1.119,0.402,2.341-0.059,2.923-1.039l4.811,1.73c0,0.002,0.002,0.002,0.002,0.002c0.23,0.082,0.484-0.033,0.568-0.262c0.049-0.129,0.029-0.266-0.041-0.377l-1.219-2.586l1.447-3.932C18.435,7.768,17.085,4.676,14.38,3.467 M9.215,16.211c-0.658-0.234-1.054-0.869-1.014-1.523l2.784,0.998C10.588,16.215,9.871,16.447,9.215,16.211 M16.573,10.27l-1.51,4.1c-0.041,0.107-0.037,0.227,0.012,0.33l0.871,1.844l-4.184-1.506l-3.734-1.342l-4.185-1.504l1.864-0.857c0.104-0.049,0.188-0.139,0.229-0.248l1.51-4.098c0.916-2.487,3.708-3.773,6.222-2.868C16.187,5.024,17.489,7.783,16.573,10.27"></path>
                                </svg>
                            </a>
                            @endif
                            @can('certificate_propriete.update')
                            <a href='#' wire:click.prevent="initData({{ $certificatepropriete ->id }})" data-bs-toggle="modal" data-bs-target="#UpdateCertificateProprieteModal">
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>

                            @endcan
                            @can('certificate_propriete.delete')
                            <a href='#' wire:click.prevent="initData({{ $certificatepropriete -> id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                                <svg class="icon icon-xs text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                            @endcan
                        </td>
                        @endcanany
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            <div class="text-center text-gray-800 mt-2">
                                <h4 class="fs-4 fw-bold">{{ __('Liste Vide') }} </h4>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{__('Montrer')}} {{$perPage > $certificateproprietes_count ? $certificateproprietes_count : $perPage  }} {{__('éléments sur ')}} {{$certificateproprietes_count}}
                </div>
                {{ $certificateproprietes->links()  }}
            </div>
        </div>
    </div>
</div>
