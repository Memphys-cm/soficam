@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($imma_directe->id);
@endphp

<div>
    <table style="margin-left:0px; margin-right:0px; text-align:center; margin-bottom:2px">
        <tr>
            <td>
                <div>REPUBLIQUE DU CAMEROUN</div>
                <div>Paix - Travail - Patrie</div>
                <div>--------------</div>
            </td>
            <td style="width: 150px"></td>
            <td>
                <div>REPUBLIC OF CAMEROON</div>
                <div>Peace - Work - Fatherland</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>REGION DU {{$imma_directe->region->region_name_fr}}</div>
                <div>--------------</div>
            </td>
            <td style="width: 150px"></td>
            <td>
                <div>{{$imma_directe->region->region_name_en}} REGION</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>DEPARTEMENT DU {{$imma_directe->division->division_name}}</div>
                <div>--------------</div>
            </td>
            <td style="width: 150px"></td>
            <td>
                <div>{{$imma_directe->division->division_name}} DIVISION</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>ARRONDISSEMENT DU {{$imma_directe->subDivision->sub_division_name}}</div>
                <div>--------------</div>
            </td>
            <td style="width: 150px"></td>
            <td>
                <div>{{$imma_directe->subDivision->sub_division_name}} SUBDIVISION</div>
                <div>--------------</div>
            </td>
        </tr>
    </table>
    <div style="padding: 12px; text-align:center; margin-top:15px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Bien Immobilier ID"></div>
    <div style="padding: 20px">
        <div style="margin-bottom:50px; text-align: center; margin-top:50px; font-size:32px; text-transform:uppercase">
            <b>certificat d'affichage</b>
        </div>
        <div style="text-align: justify; font-size:18px">Le Sous préfet de {{$imma_directe->subDivision->sub_division_name}} Soussigné, certifie avoir apposé du {{ $imma_directe->date_debut_certificat_d_affichage }} au
            {{$imma_directe->date_fin_certificat_d_affichage}}, l'extrait de la demande de Titre Foncier par M. @foreach ($imma_directe->users as $user)
                {{$user->first_name}} {{$user->last_name}};
            @endforeach sur une parcelle du
            Domaine National située dans l'Arrondissement de {{$imma_directe->subDivision->sub_division_name}}, au lieu dit {{$imma_directe->localisation}}.</div>
        <div style="text-align: justify; margin-top:30px; font-size:18px">En foi de quoi le présent certificat d'affichage est dressé
            conformément à l'Article 13 du Décrèt 76/165 du 27 Avril 1976 modifié et complété par le Décrèt N° 2005/481
            du 16 décembre 2005 fixant les conditions du Titre Foncier.</div>
        <div style="margin-top:50px">
            <table style="font-size: 14px; padding-left: 20px">
                <tr>
                    <td style="text-align: start">
                        <div>APMLIATIONS : </div>
                        <div>
                            <ul>
                                <li style="margin-left:5px">Préfet du {{$imma_directe->division->division_name}}(ACTR)</li>
                                <li style="margin-left:10px">Maire (Pr Info)</li>
                                <li style="margin-left:15px">Chef du Village (Pr Affichage)</li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 150px"></td>
                    <td style="text-align: end">
                        <div><b>Yaoundé, le____________</b></div>
                        <div>Le sous préfèt de l'arrondissement de {{$imma_directe->subDivision->sub_division_name}}</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
