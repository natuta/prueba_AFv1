<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Privilegios/Roles/Crear') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar un nuevo rol') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nuevo rol con determinados permisos.') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('roles.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="name" value="{{ __('Nombre del nuevo rol') }}" />
                            <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" />
                            @error('name')
                            <small class="text-red-600">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4 black-text text-bold font-medium">
                            <div class="font-weight-bold">
                                <p>Lista de permisos</p>
                            </div>
                            @foreach($permisos as $rbr)
                                <label class="flex justify-start items-start black-text mt-2">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                        <input type="checkbox" class="opacity-0 absolute" name="permissions[]" value="{{$rbr->id}}">
                                        <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div>
                                        <p><strong>{{$rbr->description}}</strong></p>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        <style>
                            input:checked + svg {
                                display: block;
                            }
                        </style>

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar nuevo rol
                            </button>
                            <a type="button" href="{{route('roles.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
