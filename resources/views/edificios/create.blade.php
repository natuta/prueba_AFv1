
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Edificios/crear')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar nueva ciudad a la lista') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nueva ciudad a la lista de ciudades donde la empresa opera') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{ route('edificios.store') }}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="nombre" value="{{ __('Nombre del edifico') }}" />
                            <x-jet-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" required />
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="direccion" value="{{ __('Dirección del edifico') }}" />
                            <x-jet-input id="direccion" name="direccion" type="text" class="mt-1 block w-full" required />
                            <x-jet-input-error for="direccion" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-select-box>
                                <x-slot name="label">
                                    Escoja una opción
                                </x-slot>
                                <x-slot name="main">
                                    @foreach($cities as $city)
                                        <div class="option">
                                            <option value="{{$city->id_ciudad}}">{{$city->nombre}}</option>
                                        </div>
                                    @endforeach
                                    <input class="inputvalue" type="text" name="ciudad_id" id="ciudad_id" hidden>
                                </x-slot>
                                <x-slot name="selected">
                                    Seleccione la ciudad
                                </x-slot>
                            </x-select-box>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('edificios.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</x-app-layout>
