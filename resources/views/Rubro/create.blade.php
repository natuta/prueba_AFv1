
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Rubros/crear')}}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-jet-section-title>
                <x-slot name="title">
                    {{ __('Agregar nuevo rubro') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('Formulario para agregar un nuevo rubro a la lista de la empresa') }}
                </x-slot>
            </x-jet-section-title>
            <form action="{{route('rubros.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
                @csrf
                @method("POST")
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="nombre" value="{{ __('Nombre del rubro') }}" />
                                <x-jet-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"  autocomplete="nombre" required />
                                <x-jet-input-error for="nombre" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="descripcion" value="{{ __('Descripcion del rubro') }}" />
                                <x-jet-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"  autocomplete="descripcion" required />
                                <x-jet-input-error for="descripcion" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="vida_util" value="{{ __(' Vida Util') }}" />
                                <x-jet-input id="vida_util" name="vida_util" type="number" class="mt-1 block w-full"  autocomplete="vida_util" required />
                                <x-jet-input-error for="vida_util" class="mt-2" />

                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="coeficiente_depr" value="{{ __('Coeficiente de depreciacion') }}" />
                                <x-jet-input id="coeficiente_depr" name="coeficiente_depr" type="number" class="mt-1 block w-full"  autocomplete="coeficiente_depr" required />
                                <x-jet-input-error for="coeficiente_depr" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                    Registrar
                                </button>
                                <a type="button" href="{{route('rubros.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
