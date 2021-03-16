<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Codificacion/Registrar/verificar informacion')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Registrar un nueva Codificacion') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para registrar la Codificacion de un activo fijo ') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{ route('Codificacion.store') }}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="af_id" value="{{ __('Cod. del activo') }}" />
                            <input value="{{$activo->id_AF}}" type="text" name="af_id" class="form-control" readonly   required>
                            <x-jet-input-error for="af_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="af_nombre" value="{{ __('Nombre del activo fijo') }}" />
                            <input value="{{$activo->nombre}}" type="text" name="af_nombre" class="form-control" readonly disabled required>
                            <x-jet-input-error for="af_nombre" class="mt-2" />
                        </div>



                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="qr_code" value="{{ __('qr_code') }}" />
                            <x-jet-input id="qr_code" name="qr_code" type="png" class="mt-1 block w-full"    required />
                            <x-jet-input-error for="qr_code" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                            <x-jet-input id="fecha" name="fecha" type="date" class="mt-1 block w-full"   required />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('Codificacion.create')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
