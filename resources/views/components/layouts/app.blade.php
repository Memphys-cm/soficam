<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$header ?? 'Soficam'}}</title>

    <link rel="icon" type="image/png" href="">
    <link rel="icon" href="" sizes="32x32">
    <link rel="icon" href="" sizes="192x192">
    <link rel="apple-touch-icon" href="">
    <meta name="msapplication-TileImage" content="">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/fullcalendar/main.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/leaflet/dist/leaflet.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/theme.css')}}" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.9.0/dist/cdn.min.js"></script>
    @livewireStyles
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    {{$slot}}

    <script src=" {{ asset('vendor/@popperjs/core/dist/umd/popper.min.js')}}">
    </script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>
    <script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js')}}"></script>
    <script src="{{ asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{ asset('vendor/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{ asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>
    <script src="{{ asset('vendor/simple-datatables/dist/umd/simple-datatables.js')}}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="{{ asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>
    <script src="{{ asset('vendor/leaflet/dist/leaflet.js')}}"></script>
    <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{ asset('vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script src="{{ asset('js/theme.js')}}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>



    @livewireScripts

    @yield('scripts')
    <script>
        document.addEventListener('livewire:load', function() {

            var form = document.querySelector('.form-modal')
            if (form) {
                form.addEventListener('submit', function(e) {
                    var btn = document.querySelector('button[type="submit"].btn-loading')
                    btn.setAttribute('disabled', true)
                    console.log(btn)
                    btn.innerHtml = `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>{{__('Loading')}}...`
                })
            }
            // closing any modal dynamically
            window.livewire.on('cancel', modal => {
                $('#' + modal).modal('hide');
                $('div.alert').delay(3500).fadeOut(2000);
            });

            $('div.alert-danger').delay(3500).fadeOut(2000);
        })


        let tileType = "OpenStreetMap";
        let enableAddMarker = false;

        // Initialisation de la carte
        let map = L.map('macarte').setView([7.3697, 12.3547], 13);

        let selectedTile = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Creation de l'icône
        let myIconClass = L.Icon.extend({
            options: {
                iconSize: [20, 20],
                iconAnchor: [10, 10],
                popupAnchor: [0, -10],
                shadowSize: [20, 20],
                shadowAnchor: [6, 8],
            }
        });
        let icon = new myIconClass({
            iconUrl: 'https://zestedesavoir.com/media/galleries/16186/d2a9ef14-71b2-4acb-a1cb-cf83eff0294f.png',
            shadowUrl: 'https://zestedesavoir.com/media/galleries/16186/3503ba88-d052-4f5f-81df-223c70024f04.png'
        });

        // Ajout d'un marqueur sur Paris
        L.marker([4.079616 , 9.6763904], {
            icon: icon
        }).bindPopup('Ceci est un mon emplacement').addTo(map);

        // A clic -> Si la création de marqueur est activée, on ajoute un marqueur à la position du clic
        map.on('mousedown', function(e) {
            if (enableAddMarker) {
                enableAddMarker = false;
                L.marker([e.latlng.lat, e.latlng.lng], {
                    icon: icon
                }).bindPopup('Ceci est un emplacement').addTo(map);
            }
        });

        /*
         * Classe gérant l'interface utilisateur
         */
        let MyControlClass = L.Control.extend({

            options: {
                position: 'topleft'
            },

            /*
             * Ajout de l'interface à la carte
             */
            onAdd: function(map) {

                this.map = map;

                var div = L.DomUtil.create('div', 'leaflet-bar my-control');

                // Bouton de test
                var myButton = L.DomUtil.create('button', 'my-button-class', div);

                let myImage = L.DomUtil.create('img', '', myButton);
                myImage.src =
                    "https://zestedesavoir.com/media/galleries/16186/0d474532-15c1-4d45-94e9-a3abcc6e4327.png";
                myImage.style = "margin-left:0px;width:20px;height:20px";

                L.DomEvent.on(myButton, 'click', function() {
                    alert("clic sur le button");
                }, this);

                // Bouton de changement de fond de carte
                var buttonBackground = L.DomUtil.create('button', 'my-button-class', div);

                let myBackground = L.DomUtil.create('img', '', buttonBackground);
                myBackground.src =
                    "https://zestedesavoir.com/media/galleries/16186/1b4da67d-cb8b-4c29-85cb-4633005ea1e9.svg";
                myBackground.style = "margin-left:0px;width:20px;height:20px";

                L.DomEvent.on(buttonBackground, 'click', function() {
                    this.changeBackground();
                }, this);

                // Bouton d'ajout d'un marqueur
                var buttonAddMarker = L.DomUtil.create('button', 'my-button-class', div);

                let backgroundAddMarker = L.DomUtil.create('img', '', buttonAddMarker);
                backgroundAddMarker.src =
                    "https://zestedesavoir.com/media/galleries/16186/d2a9ef14-71b2-4acb-a1cb-cf83eff0294f.png";
                backgroundAddMarker.style = "margin-left:0px;width:20px;height:20px";

                L.DomEvent.on(backgroundAddMarker, 'click', function() {
                    this.addMarker();
                }, this);

                return div;
            },

            /* 
             * Action de changement de fond d'écran
             */
            changeBackground() {
                this.map.removeLayer(selectedTile);

                if (tileType == "OpenStreetMap") {
                    tileType = "ArcGis";

                    selectedTile = L.tileLayer(
                        'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                            attribution: 'ArcGIS'
                        }).addTo(this.map);
                } else {
                    tileType = "OpenStreetMap";

                    selectedTile = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                }
            },

            /*
             * Active l'action d'ajout d'un marqueur au clic
             */
            addMarker() {
                enableAddMarker = true;
            },

            onRemove: function(map) {}
        });

        // Ajout de l'interface utilisateur à la carte
        let myControl = new MyControlClass().addTo(map);

    </script>

</body>

</html>