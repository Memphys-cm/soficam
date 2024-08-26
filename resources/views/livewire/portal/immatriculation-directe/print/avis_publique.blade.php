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
    <div style="padding: 12px;text-align:justify">
        <div style="margin-top: 10px; text-align: center"><b>
                <h1>AVIS AU PUBLUC</h1>
            </b></div>

        <div style="margin-top: 10px;font-size:14px">Le public est informe que conformément aux informations extraites
            de la
            demande y afférente,
            M <b> @foreach ($imma_directe->users as $user) {{ $user->name }} @endforeach </b> né
            (e) le <b>@foreach ($imma_directe->users as $user) {{ $user->date_of_birth }} @endforeach</b> Sollicité l’obtention d’un titre foncier sur une
            parcelle du Domaine National d’une superficie approximative de
            <b>{{ $imma_directe->superficie_ordre_versement }} </b> dans l’Arrondissement de
            <b>{{ $imma_directe->subDivision->sub_division_name_fr }} </b> de
            située dans lieu-dit
            <b>{{ $imma_directe->localisation }} </b> qu’ _______________occupe ou exploite depuis
            <b>{{ $imma_directe->date_ordre_versement }} </b>
        </div>

        <br>
        <div style="margin-top: 10px;font-size:14px">La commission consultative prévue par l’Ordonnance N74/1 du 06 juillet 1974
            et nommée par Arrêté préfectoral N1251/AP/J06 en date du 15/11/2005 se réunira sur le lieu indique ci-dessus
            à une date qui sera communiquée ultérieurement</div>
        <br>
        <div style="margin-top: 10px;font-size:14px">Selon les dispositions du Décret N2005/481 du 16 Décembre 2005 fixant les
            conditions d’obtention du titre Foncier, les oppositions ne seront plus recevables passe le délai de 30
            (trente) jours pour compter de la date de publication de l’Avis Clôture de Bornage au Bulletin des Avis
            domaniaux et Fonciers de la Région du {{ $imma_directe->region->region_name_fr }}
        </div>



        <div style="margin-top: 20px;font-size:14px"><b>AMPLITIONS </b>:
        </div>
<br>
<br>
        <div style="margin-top: 10px; display: flex;font-size:14px">

            <table>
                <tr>
                    <td style="float: left;">
                        <li>Préfet du Mfoundi(ATCR)</li>
                        <ul>
                            <li> Maire (Pr info)</li>
                            <ul>
                                <li> Chef du Village (Pr affichage)</li>
                            </ul>
                        </ul>
                    </td>
                    <td style="width: 100px"></td>
                    <td style="float: right;">
                        <ul style="list-style: none; margin: 0; padding: 0;">
                            <li>Yaounde, le _____________ </li>
                            <li>le Sous-préfet de</li>
                            <li>l’Arrondissement de YaoundeVI</li>
                        </ul>
                    </td>
                </tr>
            </table>


        </div>


    </div>

</div>
