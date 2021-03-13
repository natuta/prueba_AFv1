<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}">

        @livewireStyles
        <style>
            body{
                background-image: url('{{ asset('/backgrounds/fondo.jpg') }}');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                -webkit-background-size: cover;
                opacity: 0.9;
            }
            main{
                height: 100vh;
            }

            select {
                display: block;
                opacity: 1;
            }
            td, th {
                text-align: center;
            }
            nav.menu{
                background: linear-gradient(to right, rgb(96, 165, 250),  rgb(255, 251, 235), rgb(251, 191, 36));
                width: 100%;
                height:64px;
            }
        </style>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('materialize/js/materialize.js') }}" ></script>

    </head>

    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            <header class="bg-opacity-50 shadow">
                <div class="max-w-7xl  mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                    <div class="divider" style="width: 100%;">
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>



            <!-- <footer class="footer bg-blue-900 relative pt-2 ">
                <div class="container mx-auto px-6">
                    <div class="mt-1 flex flex-col items-center">
                            <p class="text-sm text-gray-50 font-bold mb-2">
                                © 2021 by UAGRM - Sistemas de Informacion II - Grupo E
                            </p>
                    </div>
                </div>
            </footer>
-->

        </div>

        @stack('modals')

        @livewireScripts

    </body>

</html>
