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
                {{-- <img src="{{ asset('img/doc_img/images.jpeg') }}" style="margin-top: 10px; margin-bottom: 10px;"> --}}
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
        <table style="margin-top:5vh; border:3px">
            @if ($certificate_proprietes)
                <tr>
                    @foreach ($certificate_proprietes as $certificate_propriete)
                        <td>
                            <div>
                                <b>
                                    Numero Certificat Propriété:
                                    {{ $certificate_propriete->certificate_proprietes_number }}
                                </b>
                            </div>
                            <div>
                                <b>
                                    Requérant: {{ $certificate_propriete->requestor->first_name }}
                                </b>
                            </div>
                            <div>
                                <b>
                                    Délivré Par: {{ $certificate_propriete->recorded_by }}
                                </b>
                            </div>
                            <div>
                                <b>
                                    Créé le : {{ $certificate_propriete->created_at }}
                                </b>
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endif
            @if ($lotissements)
                <tr>
                    @foreach ($lotissements as $lotissement)
                        <div>
                            <b>
                                NOM BLOCK: {{ $lotissement->block->block_name }}
                            </b>
                        </div>
                        <div>
                            <b>
                                Superficie: {{ $lotissement->surperficie_du_lot }}
                            </b>
                        </div>
                        <div>
                            <b>
                                STATUT: {{ $lotissement->statut_du_lot }}
                            </b>
                        </div>
                        <div>
                            <b>
                                DATE: {{ $lotissement->date_lotissement }}
                            </b>
                        </div>
                    @endforeach
                </tr>
            @endif
            @if ($etat_cessions)
                @foreach ($etat_cessions as $etat_cession)
                    <tr>
                        <div>
                            <b>
                                REFERENCE: {{ $etat_cession->reference_etat_cession }}
                            </b>
                        </div>
                        <div>
                            <b>
                                MONTANT: {{ $etat_cession->cout_etat_cession }}
                            </b>
                        </div>
                        <div>
                            <b>
                                TYPE D'OPERATION: {{ $etat_cession->type_operation }}
                            </b>
                        </div>
                        <div>
                            <b>
                                DATE: {{ $etat_cession->created_at }}
                            </b>
                        </div>
                    </tr>
                @endforeach
            @endif
        </table>

    </div>
</div>
