<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
        defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch"
        href="//fonts.gstatic.com">
    <style>
        @font-face {
            font-family: 'GEOMA_REGULAR_DEMO';
            src: url("{{ asset('fonts/GEOMA_REGULAR_DEMO.OTF') }}");
        }

        @font-face {
            font-family: 'ANTIPASTOPRO_BOLD_TRIAL';
            src: url("{{ asset('fonts/ANTIPASTOPRO_BOLD_TRIAL.TTF') }}");
        }

        @font-face {
            font-family: 'ANTIPASTOPRO_EXTRABOLD_TRIAL';
            src: url("{{ asset('fonts/ANTIPASTOPRO_EXTRABOLD_TRIAL.TTF') }}");
        }

        @font-face {
            font-family: 'ANTIPASTOPRO_LIGHT_TRIAL';
            src: url("{{ asset('fonts/ANTIPASTOPRO_LIGHT_TRIAL.TTF') }}");
        }

        @font-face {
            font-family: 'ANTIPASTOPRO_DEMIBOLD_TRIAL';
            src: url("{{ asset('fonts/ANTIPASTOPRO_DEMIBOLD_TRIAL.TTF') }}");
        }

        @font-face {
            font-family: 'ANTIPASTOPRO_THIN_TRIAL';
            src: url("{{ asset('fonts/ANTIPASTOPRO_THIN_TRIAL.TTF') }}");
        }

        @font-face {
            font-family: 'ANTIPASTOPRO_TRIAL';
            src: url("{{ asset('fonts/ANTIPASTOPRO_TRIAL.TTF') }}");
        }

        @font-face {
            font-family: 'ARLRDBD';
            src: url("{{ asset('fonts/ARLRDBD.TTF') }}");
        }

        @font-face {
            font-family: 'TT0524M_';
            src: url("{{ asset('fonts/TT0524M_.TTF') }}");
        }
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('layouts.navbar')

        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/moment.min.js') }} "></script>
    <script>
        $(document).ready(() => {
            AOS.init({
                  offset: 0,
                  disable: 'phone', 
            });
            $('.sidebar-toggler').click(() => {
                if ($('#menu-backdrop').hasClass('active')) {
                    $('.full-page-menu').fadeOut(200);
                    $('#menu-backdrop').removeClass('active');
                    $('body').removeClass('no-scroll');
                } else {
                    $('.full-page-menu').fadeIn(0);
                    $('#menu-backdrop').addClass('active');
                    $('body').addClass('no-scroll');
                }
            });
        });
    </script>
    @yield('script')
</body>

</html>
