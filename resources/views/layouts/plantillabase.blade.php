<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rubros</title>

   @include('layouts.styles_plantilla_base')
    @stack('styles_plantilla_base')
    <!-- Scripts -->

</head>
<body>


        <div class="min-h-screen bg-gray-100">
            @include('layouts.navbar_plantilla_base')
            @include('layouts.sidenav_plantilla_base')
        </div>
        <div class="col s12 grey lighten-4 ">
            <div class="responsive-section container bg-blue-300">
                @yield('contenido')
            </div>
        </div>


@include('layouts.scripts_plantilla_base')
@stack('scripts_plantilla_base')
</body>
</html>
