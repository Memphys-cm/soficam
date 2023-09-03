@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($imma_directe->id);
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

    <div style="padding: 12px; text-align:center; margin-top:10px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Bien Immobilier ID"></div>

    <div style="margin-top: 20px; margin-right: 15px">
        <div style="text-align: center; font-size: 24px">MESSAGE-PORTE</div>
        <div style="text-align: center">o_o_o_o_o_o</div>
        <div style="font-size: 14px"><b>
            <div style="text-align: center; margin-top:20px">LE SOUS-PREFET DE L'ARRONDISSEMENT DE {{$imma_directe->subDivision->sub_division_name}} <br> A</div>
            <ul style="margin-right: 30px">
                <li>
                    CHEF DU SERVICE DEPARTEMENTAL DES AFFAIRES FONCIERES DU {{$imma_directe->division->division_name}}
                </li>
                <li>
                    CHEF DU SERVICE DEPARTEMENTAL DU CADASTRE DU {{$imma_directe->division->division_name}}
                </li>
                <li>
                    DELEGUE DEPARTEMENTAL DE L'HABITAT ET DU DEVELOPPEMENT URBAIN
                </li>
                <li>
                    DELEGUE D'ARRONDISSEMENT D'AGRICULTURE ET DU DEVELOPPEMENT RURAL
                </li>
            </ul></b>
            <p style="text-align: justify; margin-top: 20px; font-size:14px">
            <strong style="text-decoration: underline">TEXTE</strong>: HONNEUR VOUS IMFORMER POUR DISPOSITION
            D'USAGE À PRENDRE <strong>STOP</strong> QUE
            COMMISSION CONSULTATIVE COMPETENTEDONT VOUS ETES MEMBRES SE REUNIRA LE {{$imma_directe->date_convocation}} À ____ HEURE A
            LA SOUS/PREFECTURE DE {{$imma_directe->subDivision->sub_division_name}} EN VUE DE PROCEDER À L'EXAMEN DU LITIGE FONCIER OPPOSANT 
            M/MME <b> 
            @if (count($imma_directe->users) === 1)
                @foreach ($imma_directe->users as $user)
                    {{$user->first_name}} {{$user->last_name}},
                @endforeach
            @else
                @foreach ($imma_directe->users->take(1) as $user)
                    {{$user->first_name}} {{$user->last_name}}, et consorts
                @endforeach
            @endif
                 </b>
            SIS AU QUARTIER {{$imma_directe->localisatiion}} <strong>STOP</strong> ET
                <strong>FIN</strong>.
            </p>
            <p style="font-size: 14px; text-align:justify"><strong style="text-decoration: underline">COPIE</strong>: AU CHEF DE VILLAGE DE :_____________________________ ACCOMPAGNE DE DEUX
                NOTABLES POUR PARTICIPATION EN TANT QUE MEMBRES DE LA COMMISSION ET POUR  
                LARGE DIFFUSION AUPRES DES POPULATIONS RIVERAINES DU TERRAIN CONCERNE./.
            </p>
        </div>
        <p></p>
        <p></p>
        <table style="margin-top:5vh">
            <tr style="font-size:14px">
                <td>
                    <div><strong>VU,BON A PORTER</strong></div>
                </td>
                <td style="width: 10cm;">
                    <div></div>
                </td>
                <td>
                    <div>
                        <strong>-OWONO-</strong>
                    </div>
                </td>
            </tr>
            <tr style="font-size:14px">
                <td>
                    <div><strong>{{$imma_directe->subDivision->sub_division_name}} LE</strong></div>
                </td>
            </tr>
            <tr style="font-size:14px">
                <td>
                    <div><strong>LE SOUS PREFET</strong></div>
                </td>
            </tr>
        </table>


    </div>
</div>
