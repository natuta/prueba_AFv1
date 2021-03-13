<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Mantenimientos/Finalizar mantenimiento')}}
        </h2>
    </x-slot>
    <div style="width: 100%">
        @if(session('danger'))
            <div class="text-center red-text" role="danger">
                <li>{{session('danger')}}</li>
            </div>
        @endif
    </div>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Completar la informacion una vez terminado el mantenimiento') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para completar la informacion de una revision tecnica luego del mantenimiento.') }}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <form action="{{ route('mantenimientos.update',[$mantenimiento->id_mantenimiento]) }}" method="POST" >
                @csrf
                @method("PUT")
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-6">
                                <x-jet-label for="problema" value="{{ __('Problema del mantenimiento (Descripcion)') }}" />
                                <x-jet-input id="problema" name="problema" value="{{$mantenimiento->problema}}" type="text" class="mt-1 block w-full"  autocomplete="problema" required />
                                <x-jet-input-error for="problema" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <x-jet-label for="solucion" value="{{ __('Solucion del mantenimiento (Descripcion)') }}" />
                                <x-jet-input id="solucion" name="solucion" type="text" class="mt-1 block w-full"  autocomplete="solucion" required />
                                <x-jet-input-error for="solucion" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="fecha_inicio" value="{{ __('Fecha de inicio del mantenimiento') }}" />
                                <x-jet-input id="fecha_inicio" name="fecha_inicio" type="text" disabled class="mt-1 block w-full" value="{{$mantenimiento->fecha_inicio}}" required />
                                <x-jet-input-error for="fecha_inicio" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="fecha_fin" value="{{ __('Fecha de finalizacion del mantenimiento') }}" />
                                <x-jet-input id="fecha_fin" name="fecha_fin" type="date" class="mt-1 block w-full"  autocomplete="fecha_fin" required />
                                <x-jet-input-error for="fecha_fin" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="costo" value="{{ __('Costo del mantenimiento (Bs.)') }}" />
                                <x-jet-input id="costo" name="costo" type="text" class="mt-1 block w-full"  autocomplete="costo" required />
                                <x-jet-input-error for="costo" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="conclusion" value="{{ __('Conclusion del mantenimiento') }}" />
                                <select name="conclusion" id="conclusion">
                                    <option selected >-- Seleccione una opcion --</option>
                                    <option value="1" > Egresar</option>
                                    <option value="2" > Reutilizar</option>
                                </select>
                                <x-jet-input-error for="conclusion" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                    Registrar
                                </button>
                                <a type="button" href="{{route('mantenimientos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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

    </div>
</x-app-layout>
