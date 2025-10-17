@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;

$qrCode = QrCode::size(100)->generate(url("validate-document?model={$element->uuid}&category=bien_immobilier"));
@endphp

<div>
    <table style="padding: 2px">
        <tr style="font-size: 12px">
            <td>
                <div style="text-align: center"><b>
                    <div>REPUBLIQUE DU CAMEROUN</div>
                    <div>PAIX-TRAVAIL-PATRIE</div>
                    <div>--------</div>
                    <div>MINISTERE DES DOMAINES DU CADASTRE ET</div> 
                    <div>DES AFFAIRES FONCIERES</div>
                    <div>--------</div>
                    <div>SECRETARIAT GENERAL</div>
                    <div>--------</div>
                    <div>DIVISION DES ETUDES, DE LA PLANIFICATION</div> 
                    <div>ET DE LA COOPERATION</div>
                    <div>--------</div>
                    <div>CELLULE DES ETUDES ET DE LA PLANIFICATION</div>
                    <div>--------</div></b>
                </div>
            </td>
            <td style="width: 4cm; text-align: center;">
                
            </td>
            <td>
                <div style="text-align: center"><b>
                    <div>REPUBLIC OF CAMEROON</div>
                    <div>PEACE-WORK-FATHERLAND</div>
                    <div>--------</div>
                    <div>MINISTRY OF STATE PROPERTY, SURVEYS</div> 
                    <div>AND LAND TENURE</div>
                    <div>--------</div>
                    <div>SECRETARIAT GENERAL</div>
                    <div>--------</div>
                    <div>DEPARTMENT OF STUDIES, PLANNING</div> 
                    <div>AND COOPERATION</div>
                    <div>--------</div>
                    <div>UNIT OF STUDIES AND PLANNING</div>
                    <div>--------</div></b>
                </div>
            </td>
        </tr>
    </table>
    <div style="padding: 12px; text-align:center; margin-top:15px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Bien Immobilier ID"></div>

    <div style="margin-top: 15px; text-decoration:underline; text-transform:uppercase; text-align:center"><b>liste des titres fonciers de Mr/Mme {{$bien_immobilier->requestor->first_name}} {{$bien_immobilier->requestor->last_name}}</b></div>
    <div style="padding: 12px; margin-top:20px">
        <table border=2 style="margin:auto">
            <thead style="text-align: center">
                <th style="border: 1px solid">Numéro Titre Foncier</th>
                <th style="border: 1px solid">Location</th>
                <th style="border: 1px solid">Charge</th>
                <th style="border: 1px solid">Statut</th>
                <th style="border: 1px solid">Date de délivrance</th>
            </thead>
            <tbody style="text-align: center">
                @foreach ($bien_immobilier->requestor->titrefonciers as $titre_foncier)
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">{{ $titre_foncier->numero_titre_foncier }}</td>
                    <td style="border: 1px solid">
                        <div class="d-flex align-items-centerpy-1">
                            {{__('Region')}} : <span class="fw-bolder mx-2"> {{$titre_foncier->region->region_name}} </span>
                        </div>
                        <div class="d-flex align-items-centerpy-1">
                            {{__('Division')}} : <span class="fw-bolder mx-2"> {{$titre_foncier->division->division_name}} </span>
                        </div>
                        <div class="d-flex align-items-centerpy-1">
                            {{__('Sub Divi')}} : <span class="fw-bolder mx-2"> {{$titre_foncier->subDivision->sub_division_name}} </span>
                        </div>
                        <div class="d-flex align-items-centerpy-1">
                            {{__('Lieu Dit')}} : <span class="fw-bolder mx-2"> {{$titre_foncier->lieu_dit}} </span>
                        </div>
                    </td>
                    <td style="border: 1px solid">{{ $titre_foncier->etat_TF }}</td>
                    <td style="border: 1px solid">{{ $titre_foncier->etat_terrain }}</td>
                    <td style="border: 1px solid">{{ $titre_foncier->date_de_delivrance_du_TF }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>