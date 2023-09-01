<div class="container-fluid">
    <table>

        <tr>
            <td style="text-align:center;">
                <div>REPUBLIQUE DU CAMEROUN</div>
                <div>Paix - Travail - Patrie</div>
                <div>--------------</div>
            </td>
            <td style="width: 100px"></td>
            <td style="text-align:center;">
                <div>REPUBLIC OF CAMEROON</div>
                <div>Peace - Work - Fatherland</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center">
                <div>MINISTERE DES DOMAINES DU CADASTRE <br> ET DES AFFAIRES FONCIERES</div>
                <div>--------------</div>
            </td>
            <td style="width: 100px;">

            </td>
            <td style="text-align:center">
                <div>MINISTREY OF STATE PROPERTY, SURVEYS <br> AND LAND TENURE</div>
                <div>--------------</div>
            </td>
        </tr>

        <tr>
            <td style="text-align:center">
                <div>DELEGATION REGIONAL DU {{ $imma_directe->region->region_name_fr }}</div>
                <div>--------------</div>
            </td>
            <td style="width: 100px;">

            </td>
            <td style="text-align:center">
                <div>{{ $imma_directe->region->region_name_fr }} REGIONAL DELEGATION</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center">
                <div>DELEGATION DEPARTEMENTAL DU {{ $imma_directe->division->division_name }}</div>
                <div>--------------</div>
            </td>
            <td style="width: 100px;">

            </td>
            <td style="text-align:center">
                <div>{{ $imma_directe->division->division_name }} DIVISIONAL DELEGATION</div>
                <div>--------------</div>
            </td>
        </tr>

        <tr>
            <td style="text-align:center">
                <div>SERVICE DEPARTEMENTAL DES AFFAIRES FONCIERES</div>
                <div>--------------</div>
            </td>
            <td style="width: 100px;">

            </td>
            <td style="text-align:center">
                <div>DIVITIONAL SERVICE OF LAND TENURE</div>
                <div>--------------</div>
            </td>
        </tr>
    </table>



    <div style="margin-top: 10vh">
      
        <h3 style="text-align: center;">ORDRE DE VERSEMENT DES FRAIS DE LA REDEVANCES FONCIERES D'UNE CONCESSION
                <br>
                N°_____________________/OVRVF/DDM/CF/YAOUNDE</h3>
        <p></p>
        <p></p>
        <div>
            <p style="margin-top: 10px;font-size:25px">
                Le Receveur des Domaines du {{ $imma_directe->division->division_name }} est autorisé à percevoir de
                Mme/Mlle/M @foreach ($imma_directe->users as $user)
                    {{ $user->name }}
                @endforeach . Pour le    compte de l'exercise budgé 2022 la somme de {{ $imma_directe->montant_ordre_versement }}  frans CFA
                représentant la redevance fonciere d'un lot du domaine national acquis en concession provisoire, sis a
                {{ $imma_directe->localisation }} Arrondissement de {{ $imma_directe->subDivision->sub_division_name_fr }} d'une superficie de
                {{ $imma_directe->superficie }} m2 autorise par Arrete N

            </p>
            <table style="margin-top:5vh">
                <tr style="font-size:14px">
                    <td style="width: 320px;">
                        <div></div>
                    </td>

                    <td style="text-align:center; font-size:14px">
                        <p>{{ $imma_directe->subDivision->sub_division_name_fr }}, le........................................................................</p>
                        <p>Le Chef de Service Departemental des Affaires Foncieres de <br> {{ $imma_directe->division->division_name }}   </p>
                    </td>
                </tr>
            </table>


        </div>
    </div>
