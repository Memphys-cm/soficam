@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;

$qrCode = QrCode::format('png')->size(100)->generate(url("validate-document?model={$element->uuid}&category=certificate_propriete"));

@endphp
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
                        <div>--------</div>
                    </b>
                </div>
            </td>
        </tr>
    </table>

    <div style="padding: 12px; text-align:center; margin-top:10px">
        <img src="{{'data:image/png;base64,'. base64_encode($qrCode) }} " alt="QR Code">

        <!-- <img src="$qrCode" alt="QR Code"> -->
        <!-- <img src="data:image/png;base64, {!! base64_encode($qrCode) !!} "> -->
    </div>

    <div style="margin-top: 8vh">
        <p></p>
        <h3 style="text-align: center;">CERTIFICAT DE PROPRIETE N°{{$element->certificate_proprietes_number}}/CP/MINDCAF/2/35/T600</h3>
        <div style="font-size: 14px">
            <p>Le Conservateur de la Propriété et des Droits Fonciers du Département de {{$element->titreFoncier->division->division_name}}, soussigné
                certifie que
                l'immeuble rural non bati, exploité sis à <strong>{{$element->titreFoncier->zone}}</strong> au lieu dit
                <strong>{{$element->titreFoncier->lieu_dit}}</strong>
                d'une superficie initiale de {{$element->titreFoncier->superficie_du_TF_mere}}m2 immatriculé au Livre Foncier du Département de la
                {{$element->titreFoncier->division->division_name}}, Volume {{$element->titreFoncier->volume}}, Folio {{$element->titreFoncier->numero_folio}} sous le numéro
                26773/MAF.
            </p>
            <p>Appartient en toute propriété:</p>
            <ol>
                @foreach ($element->titreFoncier->users as $user)
                <li>{{$user->first_name}} {{$user->last_name}}</li>
                @endforeach
            </ol>
            <p>Pour l'avoir acquis par Immatriculation Directe</p>
            <p>Ledit Titre Foncier sur lequel le Duplicatum N°1 a été délivré: est à ce jour grevé d'une <strong>Clause
                    d'iniliénabilité entre le co-indisaires. L'un ne pouvant effectuer de transaction, sans consentement
                    de l'autre, suivant de décret n°84/311 du 22/06/1984</strong>
                il fait l'objet d'un morcellement d'une superficie de <strong>{{$element->certificate_proprietes_number}}</strong>, suite à
                cette transaction, la superficie restante est de <strong>{{$element->titreFoncier->superficie_restant_du_TF_mere}}m2</strong> conformément aux inscription
                du Livre Foncier de la Conservation Foncière, etabli à la demande de
                <strong>{{$element->requestor->first_name}}</strong> pour <strong>Informations</strong>
            </p>
            <p>En foi de quoi le présent certificat est établi pour servir et valoir ce que de droit</p>
        </div>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <table style="margin-top:5vh">
            <tr style="font-size:14px">
                <td>
                    <div>Coût:<strong>{{$element->price}}</strong></div>
                </td>
                <td style="width: 8cm;">
                    <div></div>
                </td>
                <td>
                    <div>{{$element->titreFoncier->division->division_name}}, le <strong>______________</strong></div>
                </td>
            </tr>
            <tr style="font-size:14px">
                <td>
                    <div>Qce N°:<strong>{{$element->certificate_proprietes_number}}</strong></div>
                </td>
            </tr>
            <tr style="font-size:14px">
                <td>
                    <div><strong>Validité: 03 mois</strong></div>
                </td>
            </tr>
        </table>


    </div>
</div>