
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Panel Administrativo')}}
        </h2>
    </x-slot>
    <style>
        p{
            color: #000000;
        }
    </style>

    <section class="py-12">
        <div class="container mx-auto ">
            <div class="flex flex-wrap px-6 ">
                <div class="w-full lg:w-1/2  md:px-4 lg:px-6 py-5 ">
                    <div class="bg-white hover:shadow-xl">
                        <div class="px-4 py-4 md:px-10">
                            <h1 class="font-bold text-lg underline">
                                Activos fijos
                            </h1>
                            <div class="flex flex-wrap pt-8">
                                <div class="md:2/3">
                                    <div class="text-sm font-medium">
                                        Acciones:
                                        <a class="orange-text" href="{{route('activos_fijos.index')}}">Gestionar Activos Fijos</a>
                                        <a class="orange-text" href="#">Gestionar Codificaciones</a>
                                        <a class="orange-text" href="{{route('categorias.index')}}">Gestionar Categorias</a>
                                        <a class="orange-text" href="{{route('rubros.index')}}">Gestionar Rubros</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2  md:px-4 lg:px-6 py-5">
                    <div class="bg-white hover:shadow-xl">
                        <div class="px-4 py-4 md:px-10">
                            <h1 class="font-bold text-lg underline">
                                Usuarios
                            </h1>
                            <div class="flex flex-wrap pt-8">
                                <div class="md:2/3">
                                    <div class="text-sm font-medium">
                                        Acciones:
                                        <a class="orange-text" href="{{route('usuarios.index')}}">Gestionar Usuarios</a>
                                        <a class="orange-text" href="{{route('privilegios.index')}}">Gestionar Privilegios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2  md:px-4 lg:px-6 py-5">
                    <div class="bg-white hover:shadow-xl">
                        <div class="px-4 py-4 md:px-10">
                            <h1 class="font-bold text-lg underline">
                               Altas
                            </h1>
                            <div class="flex flex-wrap pt-8">
                                <div class="md:2/3">
                                    <div class="text-sm font-medium">
                                        Acciones:
                                        <a class="orange-text" href="{{route('compras.index')}}">Gestionar Adquisiciones</a>
                                        <a class="orange-text" href="{{route('proveedores.index')}}">Gestionar Proveedores</a>
                                        <a class="orange-text" href="">Gestionar Almacenes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2  md:px-4 lg:px-6 py-5">
                    <div class="bg-white hover:shadow-xl">
                        <div class="px-4 py-4 md:px-10">
                            <h1 class="font-bold text-lg underline">
                                Bajas
                            </h1>
                            <div class="flex flex-wrap pt-8">
                                <div class="md:2/3">
                                    <div class="text-sm font-medium">
                                        Acciones:
                                        <a class="orange-text" href="{{route('revisiones_tecnicas.index')}}">Gestionar Revisiones Tecnicas</a>
                                        <a class="orange-text" href="{{route('egresos.index')}}">Ver Egresos</a>
                                        <a class="orange-text" href="{{route('mantenimientos.index')}}">Ver Mantenimientos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2   md:px-4 lg:px-6 py-5">
                    <div class="bg-white hover:shadow-xl">
                        <div class="px-4 py-4 md:px-10">
                            <h1 class="font-bold text-lg underline">
                                Traslados
                            </h1>
                            <div class="flex flex-wrap pt-8">
                                <div class="2/3">
                                    <div class="text-sm font-medium">
                                        Accciones:
                                        <a class="orange-text" href="{{route('ciudades.index')}}">Gestionar ciudades</a>
                                        <a class="orange-text" href="{{route('edificios.index')}}">Gestionar edificios</a>
                                        <a class="orange-text" href="{{route('departamentos.index')}}">Gestionar departamentos</a>
                                        <a class="orange-text" href="{{route('movimientos.index')}}">Gestionar movimiento</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2  md:px-4 lg:px-6 py-5">
                    <div class="bg-white hover:shadow-xl">
                        <div class="px-4 py-4 md:px-10">
                            <h1 class="font-bold text-lg underline">
                                Contabilizacion
                            </h1>
                            <div class="flex flex-wrap pt-8">
                                <div class="md:2/3">
                                    <div class="text-sm font-medium">
                                        Acciones:
                                        <a class="orange-text" href="#">Gestionar Revalo</a>
                                        <a class="orange-text" href="#">Gestionar Depreciacion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</x-app-layout>


