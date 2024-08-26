@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($imma_directe->id);
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
                {{--<img src="{{ asset('img/doc_img/images.jpeg') }}" style="margin-top: 10px; margin-bottom: 10px;">--}}
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
    <div style="padding: 20px">
        <div style="margin-bottom:50px; text-align: center; margin-top:50px; font-size:32px; text-transform:uppercase">
            <b>certificat d'affichage</b>
        </div>
        <div style="text-align: justify; font-size:14px">Le Sous préfet de {{$imma_directe->subDivision->sub_division_name}} Soussigné, certifie avoir apposé du {{ $imma_directe->date_debut_certificat_affichage }} au
            {{$imma_directe->date_fin_certificat_affichage}}, l'extrait de la demande de Titre Foncier par M. @foreach ($imma_directe->users as $user)
                {{$user->first_name}} {{$user->last_name}};
            @endforeach sur une parcelle du
            Domaine National située dans l'Arrondissement de {{$imma_directe->subDivision->sub_division_name}}, au lieu dit {{$imma_directe->localisation}}.</div>
        <div style="text-align: justify; margin-top:30px; font-size:14px">En foi de quoi le présent certificat d'affichage est dressé
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
