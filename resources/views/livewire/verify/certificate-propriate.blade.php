<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat de Propriété</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            color: #4A90E2;
        }
        .error-message {
            background-color: #ffe6e6;
            color: #e74c3c;
            padding: 15px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .certificat-details {
            font-size: 14px;
            line-height: 1.6;
        }
        .certificat-details ol {
            margin: 0;
            padding-left: 20px;
        }
        .certificat-details strong {
            color: #333;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        @if ($message)
            <div class="error-message">
                {{ $message }}
            </div>
        @else
            <h3>CERTIFICAT DE PROPRIETE</h3>
            <div class="certificat-details">
                <p>N°{{ $element->certificate_proprietes_number }}/CP/MINDCAF/2/35/T600</p>
                <p>Le Conservateur de la Propriété et des Droits Fonciers du Département de
                    {{ $element->titreFoncier->division->division_name }}, soussigné
                    certifie que l'immeuble rural non bâti, exploité sis à <strong>{{ $element->titreFoncier->zone }}</strong> au lieu dit
                    <strong>{{ $element->titreFoncier->lieu_dit }}</strong> d'une superficie initiale de {{ $element->titreFoncier->superficie_du_TF_mere }}m2 immatriculé au Livre
                    Foncier du Département de la {{ $element->titreFoncier->division->division_name }}, Volume {{ $element->titreFoncier->volume }},
                    Folio {{ $element->titreFoncier->numero_folio }} sous le numéro 26773/MAF.
                </p>
                <p>Appartient en toute propriété:</p>
                <ol>
                    @foreach ($element->titreFoncier->users as $user)
                        <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                    @endforeach
                </ol>
                <p>Pour l'avoir acquis par Immatriculation Directe</p>
                <p>Ledit Titre Foncier sur lequel le Duplicatum N°1 a été délivré est à ce jour grevé d'une <strong>Clause d'iniliénabilité entre le co-indisaires. L'un ne pouvant effectuer de transaction, sans consentement de l'autre, suivant de décret n°84/311 du 22/06/1984</strong> il fait l'objet d'un morcellement d'une superficie de <strong>{{ $element->certificate_proprietes_number }}</strong>, suite à cette transaction, la superficie restante est de <strong>{{ $element->titreFoncier->superficie_restant_du_TF_mere }}m2</strong> conformément aux inscription du Livre Foncier de la Conservation Foncière, établi à la demande de <strong>{{ $element->requestor->first_name }}</strong> pour <strong>Informations</strong></p>
                <p>En foi de quoi le présent certificat est établi pour servir et valoir ce que de droit</p>
            </div>
            <div class="footer">
                <p>Coût: <strong>{{ $element->price }}</strong></p>
                <p>{{ $element->titreFoncier->division->division_name }}, le <strong>  {{ $element->created_at->format('d/m/Y') }} </strong>
                    {{-- <strong>______________</strong> --}}
                </p>
                <p>Qce N°: <strong>{{ $element->certificate_proprietes_number }}</strong></p>
                <p><strong>Validité: 03 mois</strong></p>
            </div>
        @endif
    </div>
</body>
</html>
