<div>
    <div class="container-fluid"
        style="min-height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
        @include('livewire.user.suivi-dossier.details')

        <div class="row d-flex align-items-center justify-content-center pt-5" style="min-height: 60vh;">
            @foreach ($combinedData as $item)
                <div class="col-md-12">
                    <div>
                        <h4 class="card-title">{{ __('Informations') }}</h4>
                    </div>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 d-flex align-items-start">
                                    <div class="d-flex flex-column" style="height: 30vh">
                                        <div class="d-flex align-items-center card-title" style="align-items: center">
                                            <h6>Date de début: </h6>
                                            <div style="position: absolute; left:85%">
                                                <p class="card-title">01/07/2023</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center pt-1" style="align-items: center">
                                            <h6 class="card-title">Estimation de la date de fin: </h6>
                                            <div style="position: absolute; left:85%">
                                                <p class="card-title">06/07/2023</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center pt-1" style="align-items: center">
                                            <h6 class="card-title">Statut: </h6>
                                            <div style="position: absolute; left:85%">
                                                <p class="card-title">{{ $item->statut }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center pt-1" style="align-items: center">
                                            <h6 class="card-title">Temps écoulé: </h6>
                                            <div style="position: absolute; left:85%">
                                                <p class="card-title">2 jours</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center" style="align-items: center">
                                            <h6 class="card-title">Temps restant: </h6>
                                            <div style="position: absolute; left:85%">
                                                <p class="card-title">4 jours</p>
                                            </div>
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
        <div class="row d-flex align-items-center justify-content-center pt-3" style="min-height: 60vh;">

            <div class="col-md-6 col-sm-12 mx-auto" style="width: 92%">
                <div>
                    <h4 class="card-title">Procédure</h4>
                </div>
                @if ($item instanceof \App\Models\ImmatriculationDirecte)
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mb-3">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="mb-1">
                                        <div>
                                            <h5 class="card-title">{{__('Cotation du Dossier')}}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>Status: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">{{ $item->status_cotation }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">03/07/2023</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
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
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="mb-1">
                                        <div>
                                            <h5 class="card-title">{{__('Ordre de Versement')}}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>Statut: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: green">{{ $item->status_ordre_versement }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    {{-- <p style="color: grey">{{$item->date_cotation->format('d/m/Y')}}</p> --}}
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
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
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="mb-1">
                                        <div>
                                            <h5 class="card-title">{{__('Avis au Publique ')}}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>Statut: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: green">{{ $item->status_avis_publique }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">07/07/2023</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
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
                                            <h5 class="card-title">{{__('Certificat Affichage')}}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>Statut: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: green">{{ $item->status_certificat_d_affichage }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">{{ $item->created_at->format('d/m/Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">02/07/2023</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Détails</button>
                                </div>
                            </div>
                        </div>

                    </div>
                @elseif ($item instanceof \App\Models\TitreFoncier)
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mb-3">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="mb-1">
                                        <div>
                                            <h5 class="card-title">{{__('Cotation du Dossier')}}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>Statut: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">{{ $item->status_cotation }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">03/07/2023</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
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
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="mb-1">
                                        <div>
                                            <h5 class="card-title">{{__('Ordre de Versement')}}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>{{__('Statut')}}: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: green">{{ $item->status_ordre_versement }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    {{-- <p style="color: grey">{{$item->date_cotation->format('d/m/Y')}}</p> --}}
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
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
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="mb-1">
                                        <div>
                                            <h5 class="card-title">Avis au Publique </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>Statut: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: green">{{ $item->status_avis_publique }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">07/07/2023</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
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
                                            <h5 class="card-title">Certificat Affichage</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-2">
                                        <div class="d-flex  flex-column">
                                            <div class="d-flex align-items-center">
                                                <h6>Statut: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: green">{{ $item->status_certificat_d_affichage }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de début: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">{{ $item->created_at->format('d/m/Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6>Date de fin: </h6>
                                                <div class="pt-1" style="position: absolute; left:70%">
                                                    <p style="color: grey">02/07/2023</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Détails</button>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
