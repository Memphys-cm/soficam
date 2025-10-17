// resources/views/livewire/portal/sale/invoice.blade.php

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            padding: 0;
        }

        .container-fluid {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            padding-top: 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
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
                            <div>--------</div>
                        </b>
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
                            <div>--------</div>
                        </b>
                    </div>
                </td>
            </tr>
        </table>

        <div style="margin-top: 8vh">
            <p></p>
            <h3 style="text-align: center;">CERTIFICAT D'HISTORIQUE
                N°{{ $titre_fonciers->numero_titre_foncier }}/CP/MINDCAF/2/35/T600</h3>
            <div style="font-size: 14px">
                <p>Le Conservateur de la Propriété et des Droits Fonciers du Département de
                    {{ $titre_fonciers->division->division_name }}, soussigné
                    certifie que
                    l'immeuble rural non bati, exploité sis à <strong>{{ $titre_fonciers->zone }}</strong> au lieu dit
                    <strong>{{ $titre_fonciers->lieu_dit }}</strong>
                    d'une superficie initiale de {{ $titre_fonciers->superficie_du_TF_mere }}m2 immatriculé au Livre
                    Foncier
                    du Département de la
                    {{ $titre_fonciers->division->division_name }}, Volume {{ $titre_fonciers->numero_folio }} sous le
                    numéro
                    26773/MAF.
                </p>
                <p>Appartient en toute propriété:</p>
                <ol>
                    @foreach ($titre_fonciers->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ol>

                <p>En foi de quoi le présent certificat est établi pour servir et valoir ce que de droit</p>
            </div>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            @if ($certificate_proprietes)
                <table style="margin-top:5vh; border:3px">
                    <thead>
                        <tr>
                            <th>Numero Certificat Propriété</th>
                            <th>Requérant</th>
                            <th>Délivré Par</th>
                            <th>Créé le</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificate_proprietes as $certificate_propriete)
                            <tr>
                                <td>{{ $certificate_propriete->certificate_proprietes_number }}</td>
                                <td>{{ $certificate_propriete->requestor->first_name }}</td>
                                <td>{{ $certificate_propriete->recorded_by }}</td>
                                <td>{{ $certificate_propriete->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if(!$lotissements)
                <table>
                    <thead>
                        <tr>
                            <th>NOM BLOCK</th>
                            <th>SUPERFERCIE</th>
                            <th>STATUT</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lotissements as $lotissement)
                            <tr>
                                <td>{{ $lotissement->block->block_name }}</td>
                                <td>{{ $lotissement->surperficie_du_lot }}</td>
                                <td>{{ $lotissement->statut_du_lot }}</td>
                                <td>{{ $lotissement->date_lotissement }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tr>
                </table>
            @endif
            @if ($etat_cessions)
                <table>
                    <thead>
                        <tr>
                            <th>REFERENCE</th>
                            <th>MONTANT</th>
                            <th>TYPE D'OPERATION</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etat_cessions as $etat_cession)
                            <td>{{ $etat_cession->reference_etat_cession }}</td>
                            <td>{{ $etat_cession->cout_etat_cession }}</td>
                            <td> {{ $etat_cession->type_operation }}</td>
                            <td>{{ $etat_cession->created_at }}</td>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</body>

</html>
