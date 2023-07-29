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
        // document.querySelectorAll('div.alert').querySelectorAll(":not(#elem)");
        $('div.alert').not('.alert-important').delay(3000).fadeOut(400);

        var form = document.querySelector('.form-modal')
        if (form) {
            form.addEventListener('submit', function(e) {
                var btn = document.querySelector('button[type="submit"].btn-loading')
                btn.setAttribute('disabled', true)
                console.log(btn)
                btn.innerHtml = `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>{{__('Loading')}}...`
            })
        }

        Livewire.directive('confirm', ({
            el,
            directive,
            component,
            cleanup
        }) => {
            let content = directive.expression

            // The "directive" object gives you access to the parsed directive.
            // For example, here are its values for: wire:click.prevent="deletePost(1)"
            //
            // directive.raw = wire:click.prevent
            // directive.value = "click"
            // directive.modifiers = ['prevent']
            // directive.expression = "deletePost(1)"

            let onClick = e => {
                if (!confirm(content)) {
                    e.preventDefault()
                    e.stopPropagation()
                }
            }

            el.addEventListener('click', onClick, {
                capture: true
            })

            // Register any cleanup code inside `cleanup()` in the case
            // where a Livewire component is removed from the DOM while
            // the page is still active.
            cleanup(() => {
                el.removeEventListener('click', onClick)
            })
        })
        // // closing any modal dynamically
        // window.livewire.on('cancel', modal => {
        //     $('#' + modal).modal('hide');
        // });

        // Listen for events dispatched from Livewire components...
        Livewire.on('cancel', ({
            modal
        }) => {
            $('#' + modal).modal('hide');
        })
    </script>

</body>

</html>