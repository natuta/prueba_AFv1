<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Codificacion/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido ver la informacion de Codificacion') }}
            </x-slot>
            <x-slot name="description">
                {{ __('En este formulario tambien es posible editar la información') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('codifiaciones.update',[$codificacion->id_codificacion])}}" method="POST" id="formulario" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="AF_id" value="{{ __('ID del Activo Fijo') }}" />
                            <input value="{{$codifiacion->activos_fijos->id_AF}}" type="text" id="input" name="AF_id" class="form-control" disabled required>
                            <x-jet-input-error for="AF_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="codigo" value="{{ __('Codigo') }}" />
                            <input value="{{$codificacion->codigo}}" type="text"  name="codigo" class="form-control" disabled required>
                            <x-jet-input-error for="codigo" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="estado_id" value="{{ __('Estado') }}" />
                            <input value="{{$codificacion->estados->id_estado}}" type="text"  name="estado_id" class="form-control" disabled required>
                            <x-jet-input-error for="estado_id" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <a type="button" href="{{route('mantenimientos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
