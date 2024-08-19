<div>

    <div class='container pt-3 pt-lg-4 pb-4 pb-lg-3 text-white'>
        <div class='d-flex flex-wrap align-items-center  justify-content-between '>
            <a href="{{ route('user.suivi-dossier.index') }}" sclass="">
                <svg class="icon me-1 text-gray-700 bg-gray-300 rounded-circle p-2" style="height : 2.5rem;" fill="none"
                    stroke="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <x-navigation.user-nav />
            </div>
        </div>
        <div class='d-flex flex-wrap justify-content-between align-items-center pt-3'>
            <div class=''>
                <h1 class='fw-bold display-4 text-gray-600 d-inline-flex align-items-end'>
                    <svg class="icon icon-lg me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    {{ __('Suivi Dossier') }}
                </h1>
                <p class="text-gray-800">{{ __('Voir tous les Dossiers') }} </p>
            </div>

        </div>


        <x-alert />

        <div class="card">

            <div>
                <div class="container-fluid">
                    @include('livewire.user.suivi-dossier.details')
                    @foreach ($combinedData as $item)
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-md-12">
                                <div>
                                    <h4 class="card-title">{{ __('Informations') }}</h4>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 d-flex">
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex flex-wrap align-items-center  justify-content-between ">
                                                        <div class="col-md-6">
                                                            <h6 style="color: grey">Date de début: </h6>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p style="color: grey" class="card-title  me-1">01/07/2023
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center pt-1 ">
                                                        <div class="col-md-6">
                                                            <h6 style="color: grey" class="card-title ">Estimation date
                                                                de fin: </h6>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p style="color: grey" class="card-title  me-1">06/07/2023
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center pt-1">
                                                        <div class="col-md-6">
                                                            <h6 style="color: grey" class="card-title">Statut: </h6>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <p style="color: grey" class="card-title  me-1">
                                                                {{ $item->statut }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center pt-1">
                                                        <div class="col-md-6">
                                                            <h6 style="color: grey" class="card-title">Temps écoulé:
                                                            </h6>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <p style="color: grey" class="card-title">2 jours</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="col-md-6">
                                                            <h6 style="color: grey" class="card-title">Temps restant:
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p style="color: grey" class="card-title">4 jours</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="container-fluid row d-flex align-items-center justify-content-center pt-3">

                                <div class="col-md-12 col-sm-12 mx-auto">
                                    <div>
                                        <h4 class="card-title">Procédure</h4>
                                    </div>
                                    @if ($item instanceof \App\Models\ImmatriculationDirecte)
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-1">
                                                            <div>
                                                                <h5 style="color: grey" class="card-title">
                                                                    {{ __('Cotation du Dossier') }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center pb-2">
                                                            <div class="d-flex  flex-column">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h6 style="color: grey">Status: </h6>
                                                                    </div>

                                                                    <div class="float-end col-md-6 pt-1">
                                                                        <p style="color: grey">
                                                                            {{ $item->status_cotation }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h6 style="color: grey">Date de début: </h6>
                                                                    </div>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: grey">03/07/2023</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h6 style="color: grey">Date de fin: </h6>
                                                                    </div>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: grey">04/07/2023</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#CotationModal">Détails</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-1">
                                                            <div>
                                                                <h5 style="color: grey" class="card-title">
                                                                    {{ __('Ordre de Versement') }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center pb-2">
                                                            <div class="d-flex  flex-column">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h6 style="color: grey">Statut: </h6>

                                                                    </div>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: green">
                                                                            {{ $item->status_ordre_versement }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h6 style="color: grey">Date de début: </h6>

                                                                    </div>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: grey">
                                                                            {{ $item->date_cotation }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-6">
                                                                        <h6 style="color: grey">Date de fin: </h6>

                                                                    </div>
                                                                    <div class="col-md-6 pt-1 me-1">
                                                                        <p style="color: grey">06/07/2023</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#OrdreModal">Détails</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-1">
                                                            <div>
                                                                <h5 style="color: grey" class="card-title">
                                                                    {{ __('Avis au Publique ') }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center pb-2">
                                                            <div class="d-flex  flex-column">
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="col-md-6" style="color: grey">Statut: </h6>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: green">
                                                                            {{ $item->status_avis_publique }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="col-md-6" style="color: grey">Date de début: </h6>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: grey">07/07/2023</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="col-md-6" style="color: grey">Date de fin: </h6>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: grey">08/07/2023</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">Détails</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 mb-3">
                                                <div class="card ">
                                                    <div class="card-body">
                                                        <div class="mb-1">
                                                            <div>
                                                                <h5 class="card-title">
                                                                    {{ __('Certificat Affichage') }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center pb-2">
                                                            <div class="d-flex  flex-column">
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="col-md-6" style="color: grey">Statut: </h6>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: green">
                                                                            {{ $item->status_certificat_d_affichage }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="col-md-6" style="color: grey">Date de début: </h6>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: grey">
                                                                            {{ $item->created_at->format('d/m/Y') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="col-md-6" style="color: grey">Date de fin: </h6>
                                                                    <div class="col-md-6 pt-1">
                                                                        <p style="color: grey">02/07/2023</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>
</div>
