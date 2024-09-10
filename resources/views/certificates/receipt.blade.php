<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 750px;
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #4A90E2;
        }

        h1 {
            font-size: 26px;
            color: #333;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 1.2px;
        }

        .section {
            margin-bottom: 20px;
        }

        .label {
            font-size: 14px;
            color: #777;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .value {
            font-size: 18px;
            color: #2c3e50;
            font-weight: 400;
            margin-top: 5px;
        }

        .divider {
            height: 1px;
            background-color: #e1e8ee;
            margin: 30px 0;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #9b9b9b;
            margin-top: 20px;
        }

        .highlight {
            color: #4A90E2;
            font-weight: 600;
        }

        /* Additional Styling */
        .container .section .value {
            display: block;
            margin-top: 4px;
            font-family: 'Poppins', sans-serif;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 22px;
            }

            .value {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reçu de Certificat de Propriété</h1>

        <div class="row">
            <div class="section col">
                <span class="label">Qualification</span>
                <span class="value">{{ $qualification }}</span>
            </div>

            <div class="section col">
                <span class="label">Région</span>
                <span class="value">{{ $region }}</span>
            </div>
        </div>
        
        <div class="row">
            <div class="section col">
                <span class="label">Département</span>
                <span class="value">{{ $division }}</span>
            </div>

            <div class="section col">
                <span class="label">Conservation Foncière</span>
                <span class="value">{{ $subDivision }}</span>
            </div>
        </div>

        <div class="section col">
            <span class="label">Titre Foncier</span>
            <span class="value">{{ $titre_foncier }}</span>
        </div>

        <div class="row">
            <div class="section col">
                <span class="label">Nom</span>
                <span class="value">{{ $nom }}</span>
            </div>

            <div class="section col">
                <span class="label">Prénom</span>
                <span class="value">{{ $prenom }}</span>
            </div>
        </div>

        <div class="row">
            <div class="section col">
                <span class="label">Téléphone</span>
                <span class="value">{{ $telephone }}</span>
            </div>

            <div class="section col">
                <span class="label">Email</span>
                <span class="value">{{ $email }}</span>
            </div>
        </div>

        <div class="row">
            <div class="section col">
                <span class="label">Localisation</span>
                <span class="value">{{ $localisation }}</span>
            </div>

            <div class="section col">
                <span class="label">Identifiant Unique</span>
                <span class="value">{{ $identifiant }}</span>
            </div>
        </div>

        <div class="row"></div>

        <div class="section col">
            <span class="label">Date</span>
            <span class="value">{{ $date }}</span>
        </div>

        <div class="divider"></div>

        <div class="footer">
            <p>Merci de bien vouloir conserver ce reçu pour toute utilisation ultérieure.</p>
            {{-- <p class="highlight">Ce document a été généré automatiquement.</p> --}}
        </div>
    </div>
</body>

</html>
