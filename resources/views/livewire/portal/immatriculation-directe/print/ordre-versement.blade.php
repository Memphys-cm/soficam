<div class="container-fluid">
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



    <div style="margin-top: 10vh; font-size:14px">
      
        <h3 style="text-align: center;">ORDRE DE VERSEMENT DES FRAIS DE LA REDEVANCES FONCIERES D'UNE CONCESSION
                <br>
                N°_____________________/OVRVF/DDM/CF/YAOUNDE</h3>
        <p></p>
        <p></p>
        <div>
            <p style="margin-top: 10px">
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
