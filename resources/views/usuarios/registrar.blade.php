<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos Fijos/Usuarios/Registrar')}}
        </h2>
    </x-slot>

        <x-jet-validation-errors class="mb-4" />

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Agregar nuevo usuario')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para agregar nuevo usuario desde dentro del sistema')}}
            </x-slot>
        </x-jet-section-title>
        <form method="POST" action="{{ route('usuarios.store') }}" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4 ">
                            <x-jet-label for="name" value="{{ __('Nombre del nuevo usuario') }}" />
                            <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full"  autocomplete="name" required />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4 ">
                            <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                            <x-jet-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus  />
                            <x-jet-input-error for="apellido" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4 ">
                            <x-jet-label for="sexo" value="{{ __('Sexo') }}" />
                            <x-jet-input id="sexo" class="block mt-1 w-full" type="text" name="sexo" :value="old('sexo')" required autofocus />
                            <x-jet-input-error for="sexo" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4 ">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4 ">
                            <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-jet-input-error for="password" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4 ">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-jet-input-error for="password_confirmation" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('usuarios.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
