<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Revaluos/Registrar')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Registrar un nuevo Revaluo') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para registrar una revalorizacion sobre un Activo Fijo') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('revaluos.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
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
                            <x-jet-label for="fecha_revaluo" value="{{ __('Fecha de Revaluo') }}" />
                            <input type="text" readonly name="fecha_revaluo" value=" {{ \Carbon\Carbon::now('America/Caracas')}} ">
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion acerca de  la Revalorizacion') }}" />
                            <input type="text" name="descripcion" required>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="valor" value="{{ __('Nuevo Valor Bs.') }}" />
                            <input type="text" name="valor" required>
                        </div>
                        
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="activo_id" value="{{ __('Seleccione el Activo Fijo a Revalorizar') }}" />
                            <select name="activo_id" required>
                                <option selected>-- Escoja un Activo fijo--</option>
                                @foreach( $afs as $activo)
                                    <option value="{{$activo->id_AF}}">{{$activo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="revision_id" value="{{ __('Seleccione la Revision Tecnica Correspondiente') }}" />
                            <select name="revision_id" required>
                                <option selected>-- Escoja la Revision--</option>
                                @foreach( $revisiones as $revi)
                                    <option value="{{$revi->id_revision}}"> {{$revi->id_revision}}  </option>
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
                            <a type="button" href="{{route('revaluos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
