@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
    
    $qrCode = QrCode::size(100)->generate($immobilier->id);
@endphp

<div>
    <table style="padding: 12px;margin-left:0px; margin-right:0px; text-align:center; margin-bottom:1px;font-size:15px">
        <tr>
            <td style="float: left;">
                <div>REPUBLIQUE DU CAMEROUN</div>
                <div>Paix - Travail - Patrie</div>
                <div>--------------</div>
            </td>
            <td style="width: 200px"></td>
            <td style="float: right;">
                <div>REPUBLIC OF CAMEROON</div>
                <div>Peace - Work - Fatherland</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td style="float: left;">
                <div>REGION DU {{ $immobilier->titreFoncier->region->region_name_fr }}</div>
                <div>--------------</div>
            </td>
            <td>&nbsp;</td>

            <td style="float: right;">
                <div>{{ $immobilier->titreFoncier->region->region_name_en }} REGION</div>
                <div>--------------</div>
            </td>
        </tr>

        <tr>
            <td style="float: left;">
                <div>DEPARTEMENT DU {{ $immobilier->titreFoncier->division->division_name }}</div>
                <div>--------------</div>
            </td>
            <td>&nbsp;</td>

            <td style="float: right;">
                <div>{{ $immobilier->titreFoncier->division->division_name }} DIVISION</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td style="float: left;">
                <div>ARRONDISSEMENT DU {{ $immobilier->titreFoncier->division->division_name }}</div>
                <div>--------------</div>
            </td>
            <td>&nbsp;</td>

            <td style="float: right;">
                <div>{{ $immobilier->titreFoncier->division->division_name }} SUBDIVISION</div>
                <div>--------------</div>
            </td>
        </tr>
    </table>
    <div style="padding: 12px;text-align:justify">
        <div style="margin-top: 10px; text-align: center"><b>
                <h1>AVIS AU PUBLUC</h1>
            </b></div>

        <div style="margin-top: 10px;font-size:19px">Le public est informe que conformément aux informations extraites
            de la
            demande y afférente,
            M <b> {{ $immobilier->requestor->first_name }} {{ $immobilier->requestor->last_name }} </b> né
            (e) le <b>{{ $immobilier->requestor->date_of_birth }}</b> Sollicité l’obtention d’un titre foncier sur une
            parcelle du Domaine National d’une superficie approximative de
            <b>{{ $immobilier->titreFoncier->superficie_du_TF_mere }} </b> dans l’Arrondissement de
            <b>{{ $immobilier->titreFoncier->division->division_name }} </b> de
            située dans lieu-dit
            <b>{{ $immobilier->titreFoncier->lieu_dit }} </b> qu’ _______________occupe ou exploite depuis
            <b>{{ $immobilier->titreFoncier->date_de_delivrance_du_TF }} </b>
        </div>

        <br>
        <div style="margin-top: 10px;font-size:19px">La commission consultative prévue par l’Ordonnance N74/1 du 06 juillet 1974
            et nommée par Arrêté préfectoral N1251/AP/J06 en date du 15/11/2005 se réunira sur le lieu indique ci-dessus
            à une date qui sera communiquée ultérieurement</div>
        <br>
        <div style="margin-top: 10px;font-size:19px">Selon les dispositions du Décret N2005/481 du 16 Décembre 2005 fixant les
            conditions d’obtention du titre Foncier, les oppositions ne seront plus recevables passe le délai de 30
            (trente) jours pour compter de la date de publication de l’Avis Clôture de Bornage au Bulletin des Avis
            domaniaux et Fonciers de la Région du {{ $immobilier->titreFoncier->region->region_name_fr }}
        </div>



        <div style="margin-top: 20px;font-size:19px"><b>AMPLITIONS </b>:
        </div>
<br>
<br>
        <div style="margin-top: 10px; display: flex;font-size:19px">

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
