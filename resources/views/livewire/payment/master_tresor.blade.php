<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services disponibles</title>
    <link rel="stylesheet" href="styles.css"> <!-- Relie ton fichier CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
        }

        h1 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        .header .navbar-brand img {
            max-width: 100%;
            height: auto;
        }

        .btn {
            border-radius: 20px;
            padding: 10px 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-pink {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .list-group-item {
            border: none;
            padding: 15px;
            background-color: #f0f0f0;
            margin-bottom: 5px;
            transition: background-color 0.3s;
        }

        .list-group-item:hover {
            background-color: #e9ecef;
        }
    </style>

    @livewireStyles
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/armoiries_cameroun.png') }}" alt="Logo" width="50" height="50">
                <!-- Mettre l'URL de ton logo -->
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="#">Accueil</a>
                <a class="nav-link" href="#">Rechercher</a>
                <a class="nav-link" href="#">Payer</a>
                <a class="nav-link" href="#">Contact</a>
            </div>
            <div class="ms-auto">
                <button class="btn btn-primary me-2">Français</button>
                <button class="btn btn-pink">Anglais</button>
            </div>
        </div>
    </header>

    {{ $slot }}

    @include('livewire.payment.tresor-pay.footer')


    @livewireScripts


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
