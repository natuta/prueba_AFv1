<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Codificacion/editar')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="description">
                {{ __('Formulario para editar la informacion principal de codificacion') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('codificacion.update',$codificacion->id_codificacion)}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="codigo" value="{{ __('Codigo') }}" />
                            <x-jet-input id="codigo" name="codigo" type="text" value="{{$codificacion->codigo}}" class="mt-1 block w-full" required />
                            <x-jet-input-error for="codigo" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="estado_id" value="{{ __('Seleccione un estado') }}" />
                            <select name="estado_id" >
                                <option selected>-- Escoja un estado--</option>
                                @foreach( $estados as $codific)
                                    <option value="{{$codific->id_estado}}">{{$codific->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="AF_id" value="{{ __('Seleccione un Activo Fijo') }}" />
                            <select name="AF_id">
                                <option selected>-- Escoja una categoria--</option>
                                @foreach( $activos_fijos as $codif)
                                    <option value="{{$codif->id_AF}}">{{$codif->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('codificacion.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
