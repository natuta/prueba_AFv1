<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Revisiones tecnicas/registrar')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Registrar una nueva revisón técnica') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para registrar una nueva revision tecnica de un activo fijo') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('revisiones_tecnicas.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="user_id" value="{{ __('Cod. usuario ') }}" />
                            <input type="text" readonly name="user_id" value="{{auth()->user()->id}} ">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="user_name" value="{{ __('Nombre del usuario registrante') }}" />
                            <input type="text" readonly name="user_name" value="{{auth()->user()->name}} {{auth()->user()->apellido}} ">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="fecha_revision" value="{{ __('Fecha de la revision tecnica') }}" />
                            <input type="text" readonly name="fecha_revision" value=" {{ \Carbon\Carbon::now('America/Caracas')}} ">
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="problema" value="{{ __('Problema/Motivo de la revision tecnica') }}" />
                            <input type="text" name="problema" required>
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="fecha_manetenimiento" value="{{ __('Fecha estimada del mantenimiento') }}" />
                            <input type="date"  name="fecha_inicio" required>
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="activo_id" value="{{ __('Seleccione el activo fijo a trasladar') }}" />
                            <select name="activo_id" required>
                                <option selected>-- Escoja un activo fijo--</option>
                                @foreach( $afs as $activo)
                                    <option value="{{$activo->id_AF}}">{{$activo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="direccion" value="{{ __('Seleccione el estado de la revision') }}" />
                            <select name="estado_id" required>
                                <option selected>-- Escoja un estado--</option>
                                @foreach( $estados as $depto)
                                    <option value="{{$depto->id_estado}}"> {{$depto->nombre}}  </option>
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
                            <a type="button" href="{{route('revisiones_tecnicas.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
