@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $qrCode = QrCode::size(100)->generate($titrefoncier->id);
@endphp

<div>
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

    <div style="border: 3px black double; font-size:14px">
        <p style="text-align: center">Suivant réquisition en date du <b>03/08/2016</b> visée le <b>19/01/2018</b> s/n°<b>0012/V5</b>, Volume <b>6</b>, Folio <b>05</b></p>
        <div style="text-align: justify">
            <ol>
                @foreach($titrefoncier->users as $user)
                    <li>Mr/Mme <b>{{$user->first_name}} {{$user->last_name}}</b>, domicilié(e) à {{$user->address}}, né(é) le {{$user->date_of_birth}} à {{$user->place_of_birth}}, de (père) et de (mère);</li>
                @endforeach
            </ol>
        </div>
        <div style="text-align: justify; padding: 12px">
                  Ont demandé l'immatriculation au livre foncier du département de <b>{{$titrefoncier->division->division_name}}</b>, d'un immeuble <b>{{$titrefoncier->zone}} {{$titrefoncier->etat_terrain}}</b> exploité sis à <b>{{$titrefoncier->subDivision->sub_division_name}}</b>, au lieu dit <b>{{$titrefoncier->lieu_dit}}</b>, d'une superficie de <b>{{$titrefoncier->superficie_du_TF_mere}}</b>, limité: <br>
            <ul>
                <li>Au Nord, par {{$titrefoncier->limit_nord}};</li>
                <li>Au Sud, par {{$titrefoncier->limit_sud}};</li>
                <li>A l'Est, par {{$titrefoncier->limit_est}};</li>
                <li>A l'Ouest, par {{$titrefoncier->limit_ouest}}.</li>
            </ul>
        </div>
        <div style="text-align: justify; padding: 12px">Tous ont déclaré que ledit immeuble leur appartient en toute propeiété pour l'avoir occupé et exploité conformément aux dispositions de l'article 13(1) du Décret n°2005/481 du 16/12/2005, modifiant et complétant certaines dispositions du Décret n°76/165 du 27/04/1976 fixant les conditions d'obtention du Titre Foncier.</div>
        <div style="text-align: justify; padding: 12px">Le procès verbal de bornage clos et arrêté le <b>08/06/2017</b> par <b>Cadastre</b>, Technicienne Supérieur Assermenté du Cadastre, a fait l'objet d'un avis de clôture de bornage publié au Bulletin Regional des Avis Domaniaux et Fonciers du Centre <b>n°01</b> du <b>02/01/2018</b>.</div>
        <div style="text-align: justify; padding: 12px">Au cours des délais réglementaires de publicité, aucune opposition n'a été enregistrée de la part des tiers.</div>
        <div style="text-align: justify; padding: 12px">En conséquence, la procédure réglée par la Loi aux fins de purges des droits réels existants a été close et l'immeuble sus décrit immatriculé au livre Foncier du département de {{$titrefoncier->division->division_name}}, <b>volume {{$titrefoncier->volume}}, folio {{$titrefoncier->folio}}, n° {{$titrefoncier->numero_titre_foncier}}</b> au profit de : @foreach ($titrefoncier->users as $user)
            <b>{{$user->first_name}} {{$user->last_name}}</b>; 
        @endforeach</div>
        <div></div>
        <div style="text-align: right">, {{$titrefoncier->subDivision->sub_division_name}} le_________________</div>
        <p></p>
        <div style="padding: 12px"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code for Titre Foncier ID"></div>
    </div>
    <table>
        <tr>
            <td style="text-align: left; width:5cm">Coût : 35660FCFA</td>
            <td style="text-align: center; width:5cm">Quittance N°:</td>
            <td style="text-align: right; width:5cm">DU: {{$titrefoncier->date_de_delivrance_du_TF}}</td>
        </tr>
    </table>
</div>