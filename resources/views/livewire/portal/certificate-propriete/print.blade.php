@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($certificatepropriete->id);
@endphp

<div class="container-fluid">
    <table>
        <tr style="font-size:14px">
            <td style="text-align:center">
                <div><strong>REPUBLIQUE DU CAMEROUN</strong></div>
                <div>Paix-Travail-Patrie</div>
            </td>
            <td style="width: 80px;">

            </td>
            <td style="text-align:center">
                <div><strong>REPUBLIC OF CAMEROON</strong></div>
                <div>Peace-Work-Fatherland</div>
            </td>
        </tr>
        <tr style="mb-1">
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>MINISTERE DES DOMAINES DU <br> CADASTRE ET DES AFFAIRES FONCIERES</div>
            </td>
            <td style="width: 80px;">
                <div></div>
            </td>
            <td style="text-align:center">
                <div>..............</div>
                <div>MINISTRY OF STATE PROPERTY <br> CCCC AND LAND TITLE</div>
            </td>
        </tr>
        <tr style="mb-2">
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>DELEGATION REGIONALE DU {{$certificatepropriete->titreFoncier->region->region_name}}</div>
            </td>
            <td style="width: 80px;"></td>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>REGIONAL DELEGATION OF {{$certificatepropriete->titreFoncier->region->region_name}}</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>DELEGATION DEPARTEMENTALE DE <br> {{$certificatepropriete->titreFoncier->division->division_name}} </div>
            </td>
            <td style="width: 80px;">
                <div></div>
            </td>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>DIVISIONAL DELEGATION OF <br> {{$certificatepropriete->titreFoncier->division->division_name}}</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>CONSERVATION FONCIERE DE <br> {{$certificatepropriete->titreFoncier->division->division_name}}</div>
            </td>
            <td style="width: 80px;">
                <div></div>
            </td>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>LAND'S REGISTRATION OFFICE<br>OF {{$certificatepropriete->titreFoncier->division->division_name}}</div>
            </td>
        </tr>

    </table>

    <div style="padding: 12px; text-align:center; margin-top:10px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Bien Immobilier ID"></div>

    <div style="margin-top: 10vh">
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <h3 style="text-align: center;">CERTIFICAT DE PROPRIETE N°{{$certificatepropriete->certificate_proprietes_number}}/CP/MINDCAF/2/35/T600</h3> 
       <div>
            <p>Le Conservateur de la Propriété et des Droits Fonciers du Département de {{$certificatepropriete->titreFoncier->division->division_name}}, soussigné
                certifie que
                l'immeuble rural non bati, exploité sis à <strong>{{$certificatepropriete->titreFoncier->zone}}</strong> au lieu dit
                <strong>{{$certificatepropriete->titreFoncier->lieu_dit}}</strong>
                d'une superficie initiale de {{$certificatepropriete->titreFoncier->superficie_du_TF_mere}}m2 immatriculé au Livre Foncier du Département de la
                {{$certificatepropriete->titreFoncier->division->division_name}}, Volume {{$certificatepropriete->titreFoncier->volume}}, Folio {{$certificatepropriete->titreFoncier->numero_folio}} sous le numéro
                26773/MAF.
            </p>
            <p>Appartient en toute propriété:</p>
            <ol>
                @foreach ($certificatepropriete->titreFoncier->users as $user)
                    <li>{{$user->first_name}} {{$user->last_name}}</li>
                @endforeach
                
            </ol>
            <p>Pour l'avoir acquis par Immatriculation Directe</p>
            <p>Ledit Titre Foncier sur lequel le Duplicatum N°1 a été délivré: est à ce jour grevé d'une <strong>Clause
                    d'iniliénabilité entre le co-indisaires. L'un ne pouvant effectuer de transaction, sans consentement
                    de l'autre, suivant de décret n°84/311 du 22/06/1984</strong>
                il fait l'objet d'un morcellement d'une superficie de <strong>{{$certificatepropriete->certificate_proprietes_number}}</strong>, suite à
                cette transaction, la superficie restante est de <strong>{{$certificatepropriete->titreFoncier->superficie_restant_du_TF_mere}}m2</strong> conformément aux inscription
                du Livre Foncier de la Conservation Foncière, etabli à la demande de
                <strong>{{$certificatepropriete->requestor->first_name}}</strong> pour <strong>Informations</strong>
            </p>
            <p>En foi de quoi le présent certificat est établi pour servir et valoir ce que de droit</p>
        </div>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <table style="margin-top:5vh">
            <tr style="font-size:14px">
                <td >
                    <div>Coût:<strong>{{$certificatepropriete->price}}</strong></div>
                </td>
                <td style="width: 8cm;">
                    <div></div>
                </td>
                <td >
                    <div>{{$certificatepropriete->titreFoncier->division->division_name}}, le <strong>______________</strong></div>
                </td>
            </tr>
            <tr style="font-size:14px">
                <td>
                    <div>Qce N°:<strong>{{$certificatepropriete->certificate_proprietes_number}}</strong></div>
                </td>
            </tr>
            <tr style="font-size:14px">
                <td>
                    <div><strong>Validité:03mois</strong></div>
                </td>
            </tr>
        </table>


    </div>
</div> 
