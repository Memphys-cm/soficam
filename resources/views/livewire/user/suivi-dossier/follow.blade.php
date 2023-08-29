<div>
    <div class="container-fluid"
        style="min-height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
        @include('livewire.portal.suivi-dossier.details')

        <div class="row d-flex align-items-center justify-content-center pt-5" style="min-height: 60vh;">
            <div class="col-md-12">
                <div>
                    <h4 class="card-title">Information</h4>
                </div>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 d-flex align-items-start">
                                <div class="d-flex flex-column" style="height: 55vh">
                                    <div class="d-flex align-items-center card-title" style="align-items: center">
                                        <h6>Start date: </h6>
                                        <div style="position: absolute; left:55%">
                                            <p class="card-title">01/07/2023</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1" style="align-items: center">
                                        <h6 class="card-title">Estimated end-date: </h6>
                                        <div style="position: absolute; left:55%">
                                            <p class="card-title">06/07/2023</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1" style="align-items: center">
                                        <h6 class="card-title">Status: </h6>
                                        <div style="position: absolute; left:55%">
                                            <p class="card-title">In progress...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1" style="align-items: center">
                                        <h6 class="card-title">Service: </h6>
                                        <div style="position: absolute; left:55%">
                                            <div class="pt-5">
                                                <p class="card-title">Vérifications dans le livre foncier et Signature
                                                    du
                                                    RBI
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-5" style="align-items: center">
                                        <h6 class="card-title">Elapsed time: </h6>
                                        <div style="position: absolute; left:55%">
                                            <p class="card-title">2 jours</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1" style="align-items: center">
                                        <h6 class="card-title">Time remaining: </h6>
                                        <div style="position: absolute; left:55%">
                                            <p class="card-title">4 jours</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1" style="align-items: center">
                                        <h6 class="card-title">Service: </h6>
                                        <div style="position: absolute; left:55%">
                                            <div class="pt-5">
                                                <p class="card-title">Formalisation du Relevé de Biens Immobiliers</p>
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
    </div>

    <div>
        <div class="row d-flex align-items-center justify-content-center pt-3" style="min-height: 60vh;">

            <div class="col-md-6 col-sm-12 mx-auto" style="width: 92%">
                <div>
                    <h4 class="card-title">Process</h4>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="mb-1">
                                    <div>
                                        <h5 class="card-title">Etape 1 </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-2">
                                    <div class="d-flex  flex-column">
                                        <div class="d-flex align-items-center">
                                            <h6>Status: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: green">Finish</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>Start-Date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">01/07/2023</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>End-date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">02/07/2023</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="card" style="width: 100%;background-color: lightgrey;">
                            <div class="card-body">
                                <div class="mb-1">
                                    <div>
                                        <h5 class="card-title">Etape 2 </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-2">
                                    <div class="d-flex  flex-column">
                                        <div class="d-flex align-items-center">
                                            <h6>Status: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: green">Finish</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>Start-Date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">03/07/2023</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>End-date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">04/07/2023</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <div class="mb-1">
                                    <div>
                                        <h5 class="card-title">Etape 3 </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-2">
                                    <div class="d-flex  flex-column">
                                        <div class="d-flex align-items-center">
                                            <h6>Status: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: green">Finish</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>Start-Date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">05/07/2023</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>End-date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">06/07/2023</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="card" style="width: 100%;background-color: lightgrey;">
                            <div class="card-body">
                                <div class="mb-1">
                                    <div>
                                        <h5 class="card-title">Etape 4 </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-2">
                                    <div class="d-flex  flex-column">
                                        <div class="d-flex align-items-center">
                                            <h6>Status: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: green">Finish</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>Start-Date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">07/07/2023</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>End-date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">08/07/2023</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <div class="mb-1">
                                    <div>
                                        <h5 class="card-title">Etape 5 </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-2">
                                    <div class="d-flex  flex-column">
                                        <div class="d-flex align-items-center">
                                            <h6>Status: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">Pending...</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>Start-Date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">...</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>End-date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">....</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="card" style="width: 100%;background-color: lightgrey;">
                            <div class="card-body">
                                <div class="mb-1">
                                    <div>
                                        <h5 class="card-title">Etape 6 </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-2">
                                    <div class="d-flex  flex-column">
                                        <div class="d-flex align-items-center">
                                            <h6>Status: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: green">Not Started</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>Start-Date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">...</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h6>End-date: </h6>
                                            <div class="pt-1" style="position: absolute; left:70%">
                                                <p style="color: grey">...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <br>
        <br>

    </div>

</div>
