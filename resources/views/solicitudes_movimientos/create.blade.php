<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Solicitudes de movimientos/registrar 1/2')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Registrar un nuevo movimiento') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para registrar un movimiento de un activo fijo de un departamento a otro') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{ route('movimientos.formulario') }}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="destino_dpto" value="{{ __('Seleccione el activo fijo a trasladar') }}" />
                            <select name="activo_id" >
                                <option selected>-- Escoja un activo fijo--</option>
                                @foreach( $afs as $activo)
                                    <option value="{{$activo->id_AF}}">{{$activo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="direccion" value="{{ __('Seleccion el departamento de destino') }}" />
                            <select name="destino_dpto" >
                                <option selected>-- Escoja un departamento--</option>
                                @foreach( $dpto as $depto)
                                    <option value="{{$depto->id_departamento}}">{{$depto->nombre}} - {{ $depto->edificio->nombre }} - {{ $depto->edificio->ciudad->nombre }}  </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Continuar
                            </button>
                            <a type="button" href="{{route('movimientos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
