@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($bien_immobilier->id);
@endphp

<div>
    <table style="margin-left:0px; margin-right:0px; text-align:center; margin-bottom:2px">
        <tr>
            <td>
                <div>REPUBLIQUE DU CAMEROUN</div>
                <div>Paix - Travail - Patrie</div>
                <div>--------------</div>
            </td>
            <td>
                <div>REPUBLIC OF CAMEROON</div>
                <div>Peace - Work - Fatherland</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>MINISTERE DES DOMAINES, DU CADASTRE ET DES AFFAIRES FONCIERES</div>
                <div>--------------</div>
            </td>
            <td>
                <div>MINISTRY OF STATE PROPERTY SURVEYS AND LAND TENURE</div>
                <div>--------------</div>
            </td>
        </tr>
    </table>
    <div style="margin-top: 30px; text-decoration:underline; text-transform:uppercase; text-align:center"><b>liste des titres fonciers de Mr/Mme {{$bien_immobilier->requestor->first_name}} {{$bien_immobilier->requestor->last_name}}</b></div>
    <div style="padding: 12px; margin-top:20px">
        <table style="border:2px solid; margin:auto">
            <thead style="text-align: center">
                <th>Numéro Titre Foncier</th>
                <th>Location</th>
                <th>Charge</th>
                <th>Statut</th>
                <th>Date de délivrance</th>
            </thead>
            <tbody style="text-align: center">
                @foreach ($bien_immobilier->requestor->titrefonciers as $titre_foncier)
                <tr>
                    <td>{{ $titre_foncier->numero_titre_foncier }}</td>
                    <td>
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
                    <td>{{ $titre_foncier->etat_TF }}</td>
                    <td>{{ $titre_foncier->etat_terrain }}</td>
                    <td>{{ $titre_foncier->date_de_delivrance_du_TF }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="padding: 12px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Bien Immobilier ID"></div>
    </div>
</div>