<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$header ?? 'Soficam'}}</title>
    <link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/fullcalendar/main.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/leaflet/dist/leaflet.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/theme.css')}}" rel="stylesheet">

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
            overflow: hidden
        }
    </style>
</head>

<body>
    <x-navigation.topbar />
    <x-navigation.sidebar />
    <main class='pb-4'>
        <x-navigation.navbar />
        {{$slot}}
    </main>

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
</body>

</html>