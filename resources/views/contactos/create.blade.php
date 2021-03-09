<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Contactos/registrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Agregar nuevo contacto')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para agregar el contacto del usuario: ' . $user->name . ' '. $user->apellido)}}
            </x-slot>
        </x-jet-section-title>
        <form method="POST" action="{{ route('contactos.crear',$user->id) }}" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
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

                        <div class="col-span-6 sm:col-span-3 ">
                            <x-jet-label for="email_personal" value="{{ __('Email Personal') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="email_personal" required />
                            <x-jet-input-error for="email_personal" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3 ">
                            <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="direccion" required />
                            <x-jet-input-error for="direccion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3 ">
                            <x-jet-label for="celular" value="{{ __('Celular') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="celular" required />
                            <x-jet-input-error for="celular" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3 ">
                            <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
                            <x-jet-input class="block mt-1 w-full" type="text" name="telefono" required />
                            <x-jet-input-error for="telefono" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-5 ">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a href="{{route('usuarios.show',$user->id)}}" type="button">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
