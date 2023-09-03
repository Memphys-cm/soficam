<div>
    <x-alert />
    <x-delete-modal />
    <div class='pb-3'>
        <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
            <div class="mb-lg-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/">{{__('Tableau de Bord')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Titre Foncier')}}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{__('Opérations Titres Fonciers')}}
                </h1>
            </div>
            <div class="d-flex justify-content-between mb-2">

                @can('titre_foncier.create')
                <a href="#" data-bs-toggle="modal" data-bs-target="#CreateTitreFoncierModal" class="btn btn-sm btn-primary py-2 d-inline-flex align-items-center mx-2">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> {{__('Nouveau')}}
                </a>
                @endcan
                @can('titre_foncier.import')
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-outline-tertiary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">{{__('Opérations sur titres fonciers')}}</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Autre action</a>
                        <a class="dropdown-item" href="#">Autre chose ici</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Lien séparé</a>
                    </div>
                </div>
                @endcan

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <!-- Tab Nav -->
            <ul class="nav nav-pills square nav-fill flex-column vertical-tab mb-3 mb-lg-0" id="tab12" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab-3" data-bs-toggle="tab" href="#tab-14" role="tab" aria-controls="tab-14" aria-selected="true"><span class="d-block">Tableau de Bord</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#tab-15" role="tab" aria-controls="tab-15" aria-selected="false"><span class="d-block">Profil</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab-3" data-bs-toggle="tab" href="#tab-16" role="tab" aria-controls="tab-16" aria-selected="false">Paramètres</span></a>
                </li>
            </ul>
            <!-- End of Tab Nav -->
        </div>
        <div class="col-lg-10">
            <!-- Tab Content -->
            <div class="card border-0">
                <div class="card-body py-0">
                    <div class="tab-content" id="tabcontent">
                        <div class="tab-pane fade show active" id="tab-14" role="tabpanel" aria-labelledby="tab-14">
                            <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus,
                                Marfa eiusmod Pinterest in do umami readymade swag.</p>
                            <p>Day handsome addition horrible sensible goodness two contempt. Evening for married his account removal. Estimable me disposing of be moonlight cordially curiosity.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-15" role="tabpanel" aria-labelledby="tab-15">
                            <p>Photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod
                                Pinterest in do umami readymade swag.</p>
                            <p>Day handsome addition horrible sensible goodness two contempt. Evening for married his account removal. Estimable me disposing of be moonlight cordially curiosity.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-16" role="tabpanel" aria-labelledby="tab-16">
                            <table cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse;width:472.5pt;">
                                <tbody>
                                    <tr>
                                        <td style="height:204.8pt;vertical-align:top;width:162.25pt;">
                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">REPUBLIQUE DU CAMEROUN</span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">Paix – Travail – Patrie</span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';"><span style="font-size:10pt;">*******</span></span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">MINISTERE DES DOMAINES, DU CADASTRE ET DES AFFAIRES FONCIERES</span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">*******</span></span></p>
                                        </td>
                                        <td style="height:204.8pt;vertical-align:top;width:147.95pt;">
                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><img alt="" src="userfiles/image/logomindcaf.png" style="height:141px;width:150px;" /></p>
                                        </td>
                                        <td style="height:204.8pt;vertical-align:top;width:162.3pt;">
                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">REPUBLIC OF CAMEROON</span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">Peace – Work – Fatherland</span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">*******</span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">MINISTRY OF STATE PROPERTY, SURVEY AND LAND TENURE</span></span></p>

                                            <p style="margin-left:0cm;margin-right:0cm;text-align:center;"><span style="font-size:11pt;"><span style="font-family:Calibri, 'sans-serif';">*******</span></span></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Tab Content -->
        </div>
    </div>
</div>