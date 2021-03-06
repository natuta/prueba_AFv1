
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Categorias/crear')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar nueva categoria') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nueva categoria a la lista de la empresa') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('categorias.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="nombre" value="{{ __('Nombre de la categoria') }}" />
                            <x-jet-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"  autocomplete="nombre" required />
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion de la categoria') }}" />
                            <x-jet-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"  autocomplete="descripcion" required />
                            <x-jet-input-error for="descripcion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="rubro_id" value="{{ __('Escoja el rubro a la que la cateogria pertenecer√°') }}" />
                            <select name="rubro_id" id="rubro_id">
                                <option Selected> -- Escoja un rubro -- </option>
                                @foreach($rubro as $rbr)
                                    <option value="{{$rbr->id_rubro}}">{{$rbr->nombre}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="rubro_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="depreciar" value="{{ __('Depreciar') }}" />
                            <x-jet-input id="depreciar" name="depreciar" type="number" class="mt-1 block w-full"  autocomplete="depreciar" required />
                            <x-jet-input-error for="depreciar" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="actualiza" value="{{ __('Actualiza') }}" />
                            <x-jet-input id="actualiza" name="actualiza" type="number" class="mt-1 block w-full"  autocomplete="actualiza" required />
                            <x-jet-input-error for="actualiza" class="mt-2" />
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
