<div class="container">
    <div style="padding: 7px">
        <div>Pour servir au paiement de </div>
        <div style="margin-bottom: 20px; margin-top:10px">Pour le compte de ___________</div>
        <table border=3 style="margin-top: 10px">
            <thead style="text-transform: uppercase; text-align:center">
                <th>quantité</th>
                <th>désignation</th>
                <th>prix de l'unité</th>
                <th>prix total</th>
            </thead>
            <tbody style="text-align: justify; font-weight:bold; height:250px">
                <tr>
                    <td style="width: 95px"></td>
                    <td style="width: 375px">
                        <div style="padding-top:10px">
                            <div style="text-decoration: underline; ">TRAVAUX PLANIMÉTRIQUES ET CADASTRAUX</div>
                            <div style="margin-top: 10px">Arrondissement de {{ $imma_directe->subDivision->sub_division_name_fr }}</div>
                            <div>Lieu dit {{ $imma_directe->localisation }}</div>
                            <div>État du terrain _________</div>
                            <div>Superficie {{ $imma_directe->superficie_ordre_versement }} m2</div>
                            <div>Forfait pour la recette des domaines________</div>
                            <div>Majoration 10% pour le cadastre _________</div>
                            <div>Total __________</div>
                        </div>
                        <p></p>
                        <p></p>
                        <p></p>
                        <div style="margin-top: 80px">ARRETE le Présent à la somme de _________</div>
                    </td>
                    <td style="width: 95px"></td>
                    <td style="width: 95px"></td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 20px"><b>Vu et reconnu exact :</b></div>
        <table>
            <tr>
                <td>_______le ______2____</td>
                <td style="width: 330px"></td>
                <td>_______le ______2____</td>
            </tr>
            <tr style="text-align: center">
                <td><b>Le Cessionnaire</b></td>
                <td style="width: 330px"></td>
                <td><b>Chef service du Cadastre</b></td>
            </tr>
        </table>
    </div>

</div>
