<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Egresos/crear')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar nuevo egreso') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nuevo egreso a la lista de la empresa') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('egresos.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion del egreso') }}" />
                            <x-jet-input id="descripcion" name="descripcion" type="text"  required />
                            <x-jet-input-error for="descripcion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="revision_id" value="{{ __('Cod. revision') }}" />
                            <x-jet-input value="{{$revision->id_revision}}" name="revision_id" type="text"  readonly required />
                            <x-jet-input-error for="revision_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="AF_id" value="{{ __('Cod. Activo') }}" />
                            <x-jet-input value="{{$revision->AF_id}}" name="AF_id" type="text" readonly required />
                            <x-jet-input-error for="AF_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="AF_name" value="{{ __('Nombre activo') }}" />
                            <x-jet-input value="{{$revision->activo->nombre}}" name="AF_name" type="text"  readonly required />
                            <x-jet-input-error for="AF_name" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="fecha_fin" value="{{ __('Fecha final del ult. mantenimiento') }}" />
                            <x-jet-input value="{{$revision->mantenimiento->fecha_fin}}" name="fecha_fin" type="text" disabled required />
                            <x-jet-input-error for="fecha_fin" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="fecha" value="{{ __('Fecha del egreso') }}" />
                            <x-jet-input id="fecha" name="fecha" type="date"  required />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('egresos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
