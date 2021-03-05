
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Dashboard Administrativo')}}
        </h2>
    </x-slot>
    <style>
        p{
            color: #000000;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col s6 ">
                <div class="card bg-white shadow overflow-hidden sm:rounded-md">
                    <div class="card-content orange-text">
                        <span class="card-title">Traslados</span>

                    </div>
                    <div class="card-action">
                        <a href="{{route('ciudades.index')}}">Gestionar ciudades</a>
                        <a href="{{route('edificios.index')}}">Gestionar edificios</a>
                        <a href="{{route('departamentos.index')}}">Gestionar departamentos</a>
                        <a href="{{route('movimientos.index')}}">Gestionar movimiento</a>
                    </div>
                </div>
            </div>
            <div class="col s6 ">
                <div class="card bg-white">
                    <div class="card-content orange-text">
                        <span class="card-title">Altas</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('compras.index')}}">Gestionar Adquisiciones</a>
                        <a href="{{route('proveedores.index')}}">Gestionar Proveedores</a>
                        <a href="">Gestionar Almacenes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s6 ">
                <div class="card bg-white">
                    <div class="card-content orange-text">
                        <span class="card-title">Bajas</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('revisiones_tecnicas.index')}}">Gestionar Revisiones Tecnicas</a>
                        <a href="{{route('egresos.index')}}">Ver Egresos</a>
                        <a href="{{route('mantenimientos.index')}}">Ver Mantenimientos</a>
                    </div>
                </div>
            </div>
            <div class="col s6 ">
                <div class="card bg-white">
                    <div class="card-content orange-text">
                        <span class="card-title">Activos fijos</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('rubros.index')}}">Gestionar Rubros</a>
                        <a href="{{route('categorias.index')}}">Gestionar Categorias</a>
                        <a href="">Gestionar Activos fijos</a>
                        <a href="">Gestionar Codificacion</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s6 ">
                <div class="card bg-white">
                    <div class="card-content orange-text">
                        <span class="card-title">Contabilizacion</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('revaluos.index')}}">Gestionar Revaluo</a>
                        <a href="#">Gestionar Depreciacion</a>
                    </div>
                </div>
            </div>
            <div class="col s6 ">
                <div class="card bg-white">
                    <div class="card-content orange-text">
                        <span class="card-title">Usuarios</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('usuarios.index')}}">Gestionar Usuarios</a>
                        <a href="#">Gestionar Privilegios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        

</x-app-layout>
