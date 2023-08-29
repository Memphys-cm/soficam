@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($immobilier->id);
@endphp

<div>
    <table style="margin-left:0px; margin-right:0px; text-align:center; margin-bottom:2px">
        <tr>
            <td>
                <div>REPUBLIQUE DU CAMEROUN</div>
                <div>Paix - Travail - Patrie</div>
                <div>--------------</div>
            </td>
            <td>
                <div>REPUBLIC OF CAMEROON</div>
                <div>Peace - Work - Fatherland</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>MINISTERE DES DOMAINES, DU CADASTRE ET DES AFFAIRES FONCIERES</div>
                <div>--------------</div>
            </td>
            <td>
                <div>MINISTRY OF STATE PROPERTY SURVEYS AND LAND TENURE</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>DELEGATION REGIONALE DU {{$immobilier->titreFoncier->region->region_name_fr}}</div>
                <div>--------------</div>
            </td>
            <td>
                <div>REGIONAL DELEGATION OF {{$immobilier->titreFoncier->region->region_name_en}}</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>DELEGATION DEPARTEMENTALE DU {{$immobilier->titreFoncier->division->division_name}}</div>
                <div>--------------</div>
            </td>
            <td>
                <div>DIVISIONAL DELEGATION OF {{$immobilier->titreFoncier->division->division_name}}</div>
                <div>--------------</div>
            </td>
        </tr>
        <tr>
            <td>
                <div>CONSERVATION FONCIERE DU {{$immobilier->titreFoncier->division->division_name}}</div>
                <div>--------------</div>
            </td>
            <td>
                <div>LAND'S REGISTRY OFFICE OF {{$immobilier->titreFoncier->division->division_name}}</div>
                <div>--------------</div>
            </td>
        </tr>
    </table>

    <div style="padding: 12px; text-align:center; margin-top:10px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Bien Immobilier ID"></div>

    <div style="padding: 12px; margin-top:5px">
        <div style="margin-top: 20px; text-align: center"><b>RELEVE DES BIENS IMMOBILIERS N°{{$immobilier->releve_number}}/RI/MINDFCAF/41/T120</b></div>
        <div style="margin-top: 20px; margin-left: 20px"><b>Volume{{$immobilier->titreFoncier->volume}} transcrit, Folio{{$immobilier->titreFoncier->folio}} TF N°{{$immobilier->titreFoncier->numero_titre_foncier}}</b></div>
        <div style="margin-top: 20px; text-decoration: underline; margin-top:15px; text-align:center">SECTION I/- DESISGNATION ET DESCRIPTION DE L'IMMEUBLE</div>
        <div style="margin-top: 20px; margin-left: 15px">Immeuble urbain occupé et exploité, sis à <b style="text-transform:uppercase">{{$immobilier->titreFoncier->subDivision->sub_division_name}}</b>, au lieu dit <b style="text-transform:uppercase">{{$immobilier->titreFoncier->lieu_dit}}</b>;</div>
        <div style="margin-top: 20px; margin-left: 15px"><b style="text-decoration: underline;">Contenance</b><b> : {{$immobilier->titreFoncier->superficie_du_TF_mere}}</b></div>
        <div style="margin-top: 20px; margin-left: 15px"><b style="text-decoration: underline;">Situation</b><b> : {{$immobilier->titreFoncier->subDivision->sub_division_name}}</b>, au lieu-dit <b>{{$immobilier->titreFoncier->lieu_dit}}</b></div>
        <div style="margin-top: 20px"><b style="margin-left:10px; text-decoration: underline;">LIMITES</b>:</div>
        <ul style="margin-left: 30px">
            <li><b>Au Nord-Est,</b> par; {{$immobilier->titreFoncier->limit_nord}}</li>
            <li><b>Au Sud-Est,</b> par; {{$immobilier->titreFoncier->limit_est}}</li>
            <li><b>Au Sud-Ouest,</b> par; {{$immobilier->titreFoncier->limit_oues}}</li>
            <li><b>Au Nord-Ouest,</b> par; {{$immobilier->titreFoncier->limit_sud}}</li>
        </ul>
        <div style="margin-left: 25px"><b style="text-transform: uppercase; text-decoration:underline">etat civil du proprietaire</b> :
            @foreach ($immobilier->titreFoncier->users as $user)
                @php
                    $counter = $loop->iteration; // This will give you the current iteration number
                @endphp
                <b> {{ $counter }}- {{$user->first_name}} {{$user->last_name}}</b>, domicilié à {{$user->address}}, né le {{$user->date_of_birth}} à {{$user->place_of_birth}},
            @endforeach tous Camerounais</div>
        <div style="margin-top: 30px; text-align:center; text-decoration:underline">SECTION II/-MODIFICATION DANS LA CONSISTANCE DE L'IMMEUBLE :</div>
        <div style="margin-top: 30px; margin-left: 30px"><b style="text-decoration: underline">SECTION II A :</b> <b>RAS</b></div>
        <div style="margin-top: 30px; margin-left: 30px"><b style="text-decoration: underline">SECTION II B :</b></div>
        <div style="margin-top: 20px"><b>BA 2. Dépôt du 12/12/1986: Retrait d'une parcelle {{$immobilier->titreFoncier->zone}} d'un terrain {{$immobilier->titreFoncier->etat_terrain}}, sis à {{$immobilier->titreFoncier->subDivision->sub_division_name}}, au lieu-dit {{$immobilier->titreFoncier->lieu_dit}}, d'une superficie de {{$immobilier->titreFoncier->superficie_vendu_du_TF_mere}} au profit de NZAELE Jacques, d'un montant de 2.360.000 FCFA, objet du titre foncier n° {{$immobilier->titreFoncier->numero_titre_foncier}}/{{$immobilier->titreFoncier->division->division_name}}</b></div>
    </div>

</div>