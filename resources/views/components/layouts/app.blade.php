<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@inject('request', 'Illuminate\Http\Request')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $header ?? 'Soficam' }}</title>

    <link rel="icon" type="image/png" href="">
    <link rel="icon" href="" sizes="32x32">
    <link rel="icon" href="" sizes="192x192">
    <link rel="apple-touch-icon" href="">
    <meta name="msapplication-TileImage" content="">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/fullcalendar/main.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/leaflet/dist/leaflet.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/theme.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/opensans-font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/montserrat-font.css') }}">
    <link rel="stylesheet" type="text/css"
        href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.9.0/dist/cdn.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    @livewireStyles
    <style>
        @if ($request->routeIs('login') || $request->routeIs('register') || $request->routeIs('password.request'))
            body {
                background-image: url("../img/login.svg");
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                margin-bottom: 30%;
                overflow: hidden;
            }

            /* style */

            .step-icon {
                font-size: 2rem;
                color: #007bff;
            }

            .step-item {
                margin-bottom: 1.5rem;
            }

            .step-title {
                font-weight: bold;
            }

            .step-description {
                color: #6c757d;
            }


        @endif
        * {
            font-family: 'Poppins', sans-serif;

        }

        .disabled-page {
            pointer-events: none;
            /* Désactive toutes les interactions */
            opacity: 0.5;
            /* Grise la page */
        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .displayNone {
            display: none;
        }
    </style>
</head>

<body>

    {{ $slot }}

    <script src=" {{ asset('vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
    <script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js') }}"></script>
    <script src="{{ asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/dist/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/instascan@1.0.0/dist/instascan.min.js"></script>
    <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
    <script src="{{ asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/leaflet/dist/leaflet.js') }}"></script>
    <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




    @livewireScripts

    @yield('scripts')
    <script>
        window.addEventListener('refresh-page', event => {
            location.reload();
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function() {

            var form = document.querySelector('.form-modal')
            if (form) {
                form.addEventListener('submit', function(e) {
                    var btn = document.querySelector('button[type="submit"].btn-loading')
                    btn.setAttribute('disabled', true)
                    console.log(btn)
                    btn.innerHtml =
                        `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>{{ __('Loading') }}...`
                })
            }
            // closing any modal dynamically
            window.livewire.on('cancel', modal => {
                $('#' + modal).modal('hide');
                $('div.alert').delay(3500).fadeOut(2000);
            });

            $('div.alert-danger').delay(3500).fadeOut(2000);
        })
    </script>

    <script type="text/javascript">
        // after success to play camera Webcam Ajax paly to send data to Controller
        function onScanSuccess(data) {
            $.ajax({
                type: "POST",
                cache: false,
                url: "",
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: data
                },
                success: function(data) {
                    // after success to get Answer from controller if User Registered login user by scanner
                    // and page change to Home blade
                    if (data == 1) {
                        document.getElementById('result').innerHTML = '<span class="result">' + 'Logged' +
                            '</span>';
                        $(location).attr('href', '{{ url(' / home ') }}');
                    } else {
                        return confirm('There is no user with this qr code');
                    }
                }
            })
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>

</body>

</html>
