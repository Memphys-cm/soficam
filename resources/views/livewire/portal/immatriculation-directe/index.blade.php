<div>
    <x-alert />
    @include('livewire.portal.immatriculation-directe.create')
    @include('livewire.portal.immatriculation-directe.step.cotation_step1')
    @include('livewire.portal.immatriculation-directe.step.ordre_versement')
    @include('livewire.portal.immatriculation-directe.step.certificat_affichage')
    @include('livewire.portal.immatriculation-directe.step.convocation_invitation')
    @include('livewire.portal.immatriculation-directe.step.edit_statut')
    {{-- @include('livewire.portal.immatriculation-directe.step.enregistrer_geometre') --}}
    @include('livewire.portal.immatriculation-directe.step.pv_bornage')
    @include('livewire.portal.immatriculation-directe.step.mise_en_forme_dossier_administratif')
    <x-delete-modal />
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
                        <li class="breadcrumb-item"><a href="/">{{ __('Tableau de bord') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Immatriculation Directes') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('mmatriculation Directes') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir Toutes les Immatriculation Directes') }} &#x23F0; </p>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('titre_foncier.create')
                    <a href="#" data-bs-toggle="modal" data-bs-target="#CreateImmaDirecteModal"
                        class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg> {{ __('Nouveau') }}
                    </a>
                @endcan
                @can('titre_foncier.import')
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-outline-tertiary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">{{ __('Operations on Land Title') }}</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Autre Action</a>
                            <a class="dropdown-item" href="#">Autre chose ici</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Lien séparé</a>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-3">
            <label for="search">{{ __('Recherche') }}: </label>
            <input wire:model="query" id="search" type="text" placeholder="{{ __('Recherche...') }}"
                class="form-control">
            <p class="badge badge-info" wire:model="resultCount">{{ $resultCount }}</p>
        </div>
        <div class="col-md-3">
            <label for="orderBy">{{ __('Trier par') }}: </label>
            <select wire:model="orderBy" id="orderBy" class="form-select">
                <option value="region_id">{{ __('Region') }}</option>
                <option value="date_de_delivrance_du_TF">{{ __('Date de livraison') }}</option>
                <option value="created_at">{{ __('Date de création') }}</option>
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
            <label for="perPage">{{ __('Éléments par page') }}: </label>
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
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('Numero Reference') }}</th>
                        {{-- <th class="border-bottom">{{ __('Date de Delivrance') }}</th> --}}
                        {{-- <th class="border-bottom">{{__('Requerants Principales')}}</th> --}}
                        <th class="border-bottom">{{ __('Requerants Secondaires') }}</th>
                        <th class="border-bottom">{{ __('Localisation') }}</th>
                        <th class="border-bottom">{{ __('Superficie') }}</th>
                        <th class="border-bottom">{{ __('Statut') }}</th>
                        <th class="border-bottom">{{ __('Prochaine Etape') }}</th>
                        <th class="border-bottom">{{ __('Date de création') }}</th>
                        @canany('titre_foncier.update', 'titre_foncier.delete')
                            <th class="border-bottom">{{ __('Action') }}</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse($imma_directes as $imma_directe)
                      <tr>
                        <td>
                            <span class="fw-normal"> {{$imma_directe->reference}} </span>
                        </td>
                            <td>
                                <x-elements.user :options="$imma_directe->users->take(5)" />
                            </td>
                            <td>
                                <span class="fw-normal"> {{ $imma_directe->localisation }} </span>
                            </td>
                            <td>
                                <span class="fw-normal"> {{ $imma_directe->superficie }} {{__('m2')}} </span>
                            </td>
                            <td>
                                <span
                                    class="fw-normal badge super-badge p-2 bg-{{ $imma_directe->StatutStyle }} round">{{ $imma_directe->statut }}</span>
                            </td>
                            <td>
                                <span class="fw-normal badge super-badge p-2 bg-secondary">
                                    {{ $imma_directe->next_step }} </span>
                            </td>
                            <td>
                                <span class="fw-normal">{{ $imma_directe->created_at->format('Y-m-d') }}</span>
                            </td>
                            @canany('imma_directe.update', 'titre_foncier.delete')
                                <td>
                                    @can('imma_directe.view_detail')
                                        <a href="#" data-bs-placement="top" title="Voir Les Deatils du Dossier">
                                            <svg class="icon icon-sm text-info" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </a>
                                    @endcan
                                    @can('imma_directe.update', $imma_directe)
                                    <a href="#"  data-bs-placement="top" title="Modifier le Staut du Dossier Ici" wire:click.prevent="initData({{$imma_directe->id}})" data-bs-toggle="modal" data-bs-target="#EditStatutModal" draggable="false">
                                        <svg class="icon icon-sm text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    @endcan
                                    @can('imma_directe.coter', $imma_directe)
                                        @if ($imma_directe->statut === 'Dossier Ouvert')
                                            <a href="#" data-bs-placement="top" title="Coter le Dossier Ici"
                                                wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal"
                                                data-bs-target="#CotationImmaDirecteModal" draggable="false">
                                                <svg class="icon icon-sm text-gray-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                    @endcan
                                    @can('imma_directe.ordre_versement', $imma_directe)
                                        @if ($imma_directe->next_step == 'ordre_versement')
                                            <a href="#" data-bs-placement="top" title="Etablisser L'ordre de Versement"
                                                wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal"
                                                data-bs-target="#OrdreVersementImmaDirecteModal" draggable="false">
                                                <svg class="icon icon-xs" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none"
                                                        d="M18.665,4.784H1.335c-0.479,0-0.866,0.388-0.866,0.866v8.665c0,0.479,0.388,0.866,0.866,0.866h17.33c0.479,0,0.866-0.388,0.866-0.866V5.65C19.531,5.172,19.144,4.784,18.665,4.784 M1.769,5.65c0.239,0,0.433,0.194,0.433,0.434S2.008,6.517,1.769,6.517c-0.24,0-0.434-0.193-0.434-0.433S1.529,5.65,1.769,5.65 M1.769,14.315c-0.24,0-0.434-0.194-0.434-0.434s0.194-0.433,0.434-0.433c0.239,0,0.433,0.193,0.433,0.433S2.008,14.315,1.769,14.315 M18.231,14.315c-0.239,0-0.433-0.194-0.433-0.434s0.193-0.433,0.433-0.433c0.24,0,0.434,0.193,0.434,0.433S18.472,14.315,18.231,14.315M18.665,12.662c-0.136-0.049-0.281-0.08-0.434-0.08c-0.718,0-1.3,0.583-1.3,1.3c0,0.152,0.031,0.298,0.08,0.434H2.989c0.048-0.136,0.08-0.281,0.08-0.434c0-0.717-0.583-1.3-1.3-1.3c-0.153,0-0.297,0.031-0.434,0.08V7.304c0.136,0.048,0.281,0.079,0.434,0.079c0.717,0,1.3-0.582,1.3-1.299c0-0.153-0.032-0.297-0.08-0.434h14.023c-0.049,0.136-0.08,0.281-0.08,0.434c0,0.718,0.582,1.299,1.3,1.299c0.152,0,0.298-0.031,0.434-0.079V12.662z M18.231,6.517c-0.239,0-0.433-0.193-0.433-0.433s0.193-0.434,0.433-0.434c0.24,0,0.434,0.194,0.434,0.434S18.472,6.517,18.231,6.517 M5.235,6.517H4.368c-0.24,0-0.433,0.194-0.433,0.433c0,0.24,0.193,0.433,0.433,0.433h0.867c0.239,0,0.433-0.193,0.433-0.433C5.668,6.711,5.474,6.517,5.235,6.517 M15.632,12.582h-0.866c-0.239,0-0.433,0.194-0.433,0.434s0.193,0.434,0.433,0.434h0.866c0.239,0,0.434-0.194,0.434-0.434S15.871,12.582,15.632,12.582 M10,6.517c-1.914,0-3.465,1.552-3.465,3.466c0,1.915,1.552,3.466,3.465,3.466c1.914,0,3.467-1.552,3.467-3.466C13.467,8.069,11.914,6.517,10,6.517 M11.795,9.474c-0.059,0.4-0.279,0.593-0.571,0.661c0.401,0.21,0.606,0.534,0.411,1.093c-0.241,0.694-0.815,0.753-1.579,0.607l-0.185,0.747L9.423,12.47l0.183-0.737c-0.116-0.028-0.234-0.06-0.356-0.093l-0.184,0.74l-0.447-0.111l0.185-0.749c-0.104-0.027-0.211-0.056-0.319-0.083l-0.582-0.146l0.222-0.516c0,0,0.33,0.088,0.325,0.082c0.127,0.032,0.183-0.051,0.205-0.107l0.292-1.18C8.964,9.573,8.98,9.578,8.995,9.581C8.978,9.573,8.961,9.569,8.949,9.566l0.208-0.842C9.163,8.627,9.13,8.507,8.949,8.461c0.006-0.004-0.325-0.082-0.325-0.082l0.119-0.48L9.36,8.054v0.002c0.092,0.023,0.188,0.045,0.285,0.067l0.184-0.74l0.447,0.113l-0.18,0.725c0.121,0.027,0.241,0.056,0.359,0.085l0.177-0.721l0.449,0.112l-0.184,0.74C11.464,8.634,11.876,8.928,11.795,9.474 M9.976,8.753L9.753,9.652c0.252,0.064,1.032,0.322,1.158-0.187C11.042,8.935,10.229,8.816,9.976,8.753 M9.641,10.106l-0.246,0.991c0.303,0.076,1.239,0.378,1.377-0.181C10.917,10.333,9.944,10.183,9.641,10.106">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if ($imma_directe->statut == 'Ordre de Versement en Attente de Paiement')
                                            <a href="#" data-bs-placement="top" title="Etablisser L'ordre de Versement"
                                                wire:click.prevent='ordreDeVersementPdf({{ $imma_directe->id }})'
                                                draggable="false">
                                                <svg class="icon icon-sm text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                </svg>
                                            </a>
                                        @endif
                                    @endcan
                                 
                                    @can('imma_directe.avis', $imma_directe)
                                        {{-- @if ($imma_directe->next_step == 'Preparation Avis Au publique') --}}
                                        @if ($imma_directe->next_step == 'Preparation Avis Au publique')
                                            <a href="#" data-bs-placement="top" title="Etablisser L'Avis Au Public"
                                                wire:click.prevent='printAvisPdf({{ $imma_directe->id }})' draggable="false">
                                                <svg class="icon icon-sm text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                </svg>
                                            </a>
                                        @endif
                                    @endcan
                                    @can('imma.directe.convocation', $imma_directe)
                                        <a href="#" data-bs-placement="top"
                                            title="Imprimer La convocation D'Invitation sur le Terrain"
                                            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal"
                                            data-bs-target="#ConvocationImmaDirecteModal" draggable="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                            </svg>
                                        </a>
                                        @if ($imma_directe->next_step == 'Certificat_Affichage')
                                        @endif
                                    @endcan
                                    {{-- <button class="btn btn-primary" wire:click="printPdf">Pdf</button> --}}
                            @include('livewire.portal.immatriculation-directe.layout.action')
                                    @can('titre_foncier.delete')
                                        <a href="#" data-bs-placement="top" title="Supprimer le Dossier Ici"
                                            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal"
                                            data-bs-target="#DeleteModal" href="#" draggable="false">
                                            <svg class="icon icon-sm text-danger me-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @endcan
                                </td>
                            @endcanany
                        </tr>

                    @empty
                        <tr>
                            <td colspan="9" class="text-center">
                                <div class="text-center text-gray-800 mt-2">
                                    <h4 class="fs-4 fw-bold">{{ __('Opps rien ici') }} &#128540;</h4>
                                    <p>{{ __('Aucun enregistrement trouvé..!') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                <div>
                    {{ __('Affichage') }} {{ $perPage > $imma_directes_count ? $imma_directes_count : $perPage }}
                    {{ __('éléments de') }} {{ $imma_directes_count }}
                </div>
                {{ $imma_directes->links() }}
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endpush
