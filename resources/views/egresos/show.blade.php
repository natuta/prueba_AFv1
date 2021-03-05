<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Egresos/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido ver la informacion del egreso') }}
            </x-slot>
            <x-slot name="description">
                {{ __('En este formulario no es posible editar la información') }}
            </x-slot>
        </x-jet-section-title>
        <form class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion del egreso') }}" />
                            <input value="{{ $egreso->descripcion }}" type="text" name="descripcion" class="form-control" disabled required>
                            <x-jet-input-error for="descripcion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="revision_id" value="{{ __('Cod. Revision') }}" />
                            <input value="{{ $egreso->revision_id }}" type="text" name="revision_id" class="form-control" disabled required>
                            <x-jet-input-error for="revision_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="fecha" value="{{ __('Cod. Activo') }}" />
                            <input value="{{ $egreso->revision->AF_id }}" type="text"  name="fecha" class="form-control" disabled  required>
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="fecha" value="{{ __('Nombre Activo') }}" />
                            <input value="{{ $egreso->revision->activo->nombre }}" type="text"  name="fecha" class="form-control" disabled  required>
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="fecha" value="{{ __('Fecha egreso') }}" />
                            <input value="{{ $egreso->fecha }}" type="text"  name="fecha" class="form-control" disabled  required>
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <a type="button" href="{{ route('egresos.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
