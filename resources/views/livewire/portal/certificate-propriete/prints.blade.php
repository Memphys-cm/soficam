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
        @if (!empty($certificate_proprietes))
            <table style="margin-top:5vh; border:3px">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('NUMERO') }}</th>
                        <th class="border-bottom">{{ __('REQUERANT') }}</th>
                        <th class="border-bottom">{{ __('DELIVRE PAR') }}</th>
                        <th class="border-bottom">{{ __('DATE') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificate_proprietes as $certificate_propriete)
                        <tr>
                            <td>
                                {{ $certificate_propriete->certificate_proprietes_number }}
                            </td>
                            <td>
                                {{ $certificate_propriete->requestor->first_name }}
                            </td>
                            <td>
                                {{ $certificate_propriete->recorded_by }}
                            </td>
                            <td>
                                {{ $certificate_propriete->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
         {{--@if (!empty($lotissements))
            <table style="margin-top:5vh">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('Nom Block') }}</th>
                        <th class="border-bottom">{{ __('SUPERFICIE DU LOT') }}</th>
                        <th class="border-bottom">{{ __('STATUT') }}</th>
                        <th class="border-bottom">{{ __('DATE DU LOTISSEMENT') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lotissements as $lotissement)
                        <tr>
                            <td>
                                {{ $lotissement->block->block_name }}
                            </td>
                            <td>
                                {{ $lotissement->surperficie_du_lot }}
                            </td>
                            <td>
                                {{ $lotissement->statut_du_lot }}
                            </td>
                            <td>
                                {{ $lotissement->date_lotissement }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if (!empty($etat_cessions))
            <table style="margin-top:5vh">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('REFERENCE') }}</th>
                        <th class="border-bottom">{{ __('TYPE D\'OPERATION') }}</th>
                        <th class="border-bottom">{{ __('COUT') }}</th>
                        <th class="border-bottom">{{ __('DATE') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etat_cessions as $etat_cession)
                        <tr>
                            <td>
                                {{ $etat_cession->reference_etat_cession }}
                            </td>
                            <td>
                                {{ $etat_cession->type_operation }}
                            </td>
                            <td>
                                {{ $etat_cession->cout_etat_cession }}
                            </td>
                            <td>
                                {{ $etat_cession->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
         @if (!empty($ventes))
            <fieldset>
                <legend class="fs-4 mb-3">{{ __('Informations sur les charges') }}</legend>
                <table style="margin-top:5vh">
                    <thead>
                        <tr>
                            <th class="border-bottom">{{ __('REFERENCE') }}</th>
                            <th class="border-bottom">{{ __('MONTANT') }}</th>
                            <th class="border-bottom">{{ __('TYPE DE VENTE') }}</th>
                            <th class="border-bottom">{{ __('EFFECTUE PAR') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventes as $vente)
                            <tr>
                                <td>
                                    {{ $vente->sales_code }}
                                </td>
                                <td>
                                    {{$vente->sales_amount}}
                                </td>
                                <td>
                                    {{ $vente->sales_type }}
                                </td>
                                <td>
                                    {{ $vente->created_by }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr style="font-size:14px">
                        <td>
                            <div>Qce N°:<strong>{{ $element->certificate_proprietes_number }}</strong></div>
                        </td>
                    </tr>
                    <tr style="font-size:14px">
                        <td>
                            <div><strong>Validité: 03 mois</strong></div>
                        </td>
                    </tr>
                </table>
            </fieldset>
        @endif --}}


    </div>
</div>
