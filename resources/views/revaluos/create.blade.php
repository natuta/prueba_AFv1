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
                            <input type="text" readonly  name="user_id" value="{{auth()->user()->id}} ">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="user_name" value="{{ __('Nombre del usuario registrante') }}" />
                            <input type="text" readonly name="user_name" value="{{auth()->user()->name}} {{auth()->user()->apellido}} ">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="fecha" value="{{ __('Fecha de Revaluo') }}" />
                            <input type="text" readonly name="fecha" value=" {{ \Carbon\Carbon::now('America/Caracas')}} ">
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="revision_id" value="{{ __('Cod Rev Tec') }}" />
                            <input type="text" name="revision_id" value="{{$revision->id_revision}}" readonly>
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="nuevoValor" value="{{ __('Cod activo') }}" />
                            <input type="text" name="activo_id" value="{{$activo->id_AF}}" readonly>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="nuevoValor" value="{{ __('Nombre del activo') }}" />
                            <input type="text" name="activo_name" value="{{$activo->nombre}}" readonly>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <input type="text" name="monto" value="{{$monto}}" hidden>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="antiguoValor" value="{{ __('Antiguo valor Bs.') }}" />
                            <input type="text" name="antiguoValor" value="{{$monto}}" readonly>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="nuevoValor" value="{{ __('Nuevo valor Bs.') }}" />
                            <input type="text" name="nuevoValor" value="{{$nuevo_monto}}" readonly>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion acerca de la Revalorizacion') }}" />
                            <input type="text" name="descripcion" required>
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Continuar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
