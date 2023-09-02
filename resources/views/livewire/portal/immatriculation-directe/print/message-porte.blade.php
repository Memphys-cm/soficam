@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($imma_directe->id);
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
                <div>REGION DE {{$imma_directe->region->region_name_fr}}</div>
            </td>
            <td style="width: 80px;">
                <div></div>
            </td>
            <td style="text-align:center">
                <div>..............</div>
                <div> {{$imma_directe->region->region_name_en}} REGION</div>
            </td>
        </tr>
        <tr style="mb-2">
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>DEPARTEMENT DU  {{$imma_directe->division->division_name}}</div>
            </td>
            <td style="width: 80px;"></td>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>{{$imma_directe->division->division_name}} DIVISION</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>ARRONDISSEMENT DE {{$imma_directe->subDivision->sub_division_name}}</div>
            </td>
            <td style="width: 80px;">
                <div></div>
            </td>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>{{$imma_directe->subDivision->sub_division_name}} SUBDIVISION</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>SOUS PREFECTURE DE {{$imma_directe->subDivision->sub_division_name}}</div>
            </td>
            <td style="width: 80px;">
                <div></div>
            </td>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>{{$imma_directe->subDivision->sub_division_name}} DIVISIONNAL OFFICE</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>BUREAU DES AFFAIRES ADMINISTRATIVES <br> JURIDIQUES ET POLITIQUES</div>
                <div>..............</div>
            </td>
            <td style="width: 80px;">
                <div></div>
            </td>
            <td style="text-align:center; font-size:14px">
                <div>..............</div>
                <div>ADMINISTRATIVE JURIDICS AND <br> POLITICALS <br> AFFAIRS OFFICE</div>
                <div>..............</div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; font-size:14px">
                <div>N°_________________/MP/JO6_07/BAAJP</div>
            </td>
        </tr>

    </table>

    <div style="padding: 12px; text-align:center; margin-top:10px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Bien Immobilier ID"></div>

    <div style="margin-top: 20px; margin-right: 15px">
        <div style="text-align: center; font-size: 24px">MESSAGE-PORTE</div>
        <div style="text-align: center">o_o_o_o_o_o</div>
        <div><b>
            <div style="text-align: center; margin-top:20px">LE SOUS-PREFET DE L'ARRONDISSEMENT DE {{$imma_directe->subDivision->sub_division_name}} <br> A</div>
            <ul style="margin-right: 30px; font-size: 14px">
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
