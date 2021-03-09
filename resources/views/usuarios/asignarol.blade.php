<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos Fijos/Usuarios/Asignar Rol')}}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Asignacion de rol')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para un rol al usuario: ')}}
            </x-slot>
        </x-jet-section-title>

        <form method="POST" action="{{ route('usuarios.update',[$user->id]) }}" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-1 ">
                            <x-jet-label>{{ __('Cod. Usuario') }}</x-jet-label>
                            <x-jet-input value="{{$user->id}}" readonly required/>
                        </div>

                        <div class="col-span-6 sm:col-span-5 ">
                            <x-jet-label>{{ __('Nombre del usuario') }}</x-jet-label>
                            <x-jet-input value="{{$user->name}} {{$user->apellido}}"  readonly required/>
                        </div>
                        <div class="col-span-6 sm:col-span-4 ">
                            <x-jet-label for="name" value="{{ __('Elija una opcion') }}" />
                            @foreach($roles as $rol)
                                <label class="flex justify-start items-start black-text mt-2">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                        <input type="checkbox" class="opacity-0 absolute" name="roles[]" value="{{$rol->id}}">
                                        <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div>
                                        <p><strong>{{$rol->name}}</strong></p>
                                    </div>
                                </label>
                            @endforeach

                        </div>
                        <div class="col-span-6 sm:col-span-5 ">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a href="{{route('usuarios.index')}}" type="button">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <style>
        input:checked + svg {
            display: block;
        }
    </style>
</x-app-layout>
