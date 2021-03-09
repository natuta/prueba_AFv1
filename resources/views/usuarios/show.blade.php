<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Usuarios/ver') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Agregar nuevo usuario')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para visualizar los datos del usuario: ' . $user->name . ' '. $user->apellido)}}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="name" value="{{ __('Nombre') }}" />
                            <x-jet-input value="{{$user->name}}"  name="name" type="text" class="mt-1 block w-full"  autocomplete="name" required disabled/>
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                            <x-jet-input value="{{$user->apellido}}" class="block mt-1 w-full" type="text" name="apellido" required disabled />
                            <x-jet-input-error for="apellido" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="sexo" value="{{ __('Sexo') }}" />
                            <x-jet-input value="{{$user->sexo}}" class="block mt-1 w-full" type="text" name="sexo" required disabled />
                            <x-jet-input-error for="sexo" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3 ">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input value="{{$user->email}}" class="block mt-1 w-full" type="email" name="email"  required disabled/>
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        @if($user->estado_id != null)
                            <div class="col-span-6 sm:col-span-6 ">
                                <x-jet-label for="estado_id" value="{{ __('Estado') }}" />
                                <x-jet-input value="{{$user->estado->nombre}}" class="block mt-1 w-full" type="text" name="estado_id" required disabled />
                                <x-jet-input-error for="estado_id" class="mt-2" />
                            </div>
                        @endif

                        <div class="col-span-6 sm:col-span-4">
                            <a type="button" href="{{route('usuarios.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seccion de contacto, hecho-->
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Contacto del usario')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para visualizar el contacto del usuario: ' . $user->name . ' '. $user->apellido)}}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        @if($user->contacto_id != null)
                            <div class="col-span-6 sm:col-span-2 ">
                                <x-jet-label for="email_personal" value="{{ __('Email Personal') }}" />
                                <x-jet-input value="{{$user->contacto->email_personal}}" class="block mt-1 w-full" type="email" name="email_personal"  required disabled/>
                                <x-jet-input-error for="email_personal" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4 ">
                                <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
                                <x-jet-input value="{{$user->contacto->direccion}}" class="block mt-1 w-full" type="text" name="direccion" required disabled />
                                <x-jet-input-error for="direccion" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3 ">
                                <x-jet-label for="celular" value="{{ __('Celular') }}" />
                                <x-jet-input value="{{$user->contacto->celular}}" class="block mt-1 w-full" type="text" name="celular" required disabled/>
                                <x-jet-input-error for="celular" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3 ">
                                <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
                                <x-jet-input value="{{$user->contacto->telefono}}" class="block mt-1 w-full" type="text" name="telefono" required disabled />
                                <x-jet-input-error for="telefono" class="mt-2" />
                            </div>
                        @else
                            <div class="col-span-6 sm:col-span-6 ">
                                <div class="bg-red-lightest border border-red-400 bg-red-200 text-center text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Uy, pero que ha pasao!</strong>
                                    <span class="block sm:inline">El usuario aun no tiene informacion de contacto. Agregala</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <a type="button" href="{{route('usuarios.asignar_contacto',$user->id)}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                    Agregar contacto
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Seccion del rol, hecho y funciona biensisimo-->
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Roles del usario')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para visualizar el estado del usuario: ' . $user->name . ' '. $user->apellido)}}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        @if( $cantidad_roles > 0 )
                            <div class="col-span-6 sm:col-span-6 ">
                                <x-jet-label for="email_personal" value="{{ __('Lista de roles') }}" />
                                <div class="text-gray-400">
                                    <h6>Rol(es) asignado(s):</h6>
                                    @foreach($roles as $rol)
                                        <li class="ml-12"> {{$rol->name}} </li>

                                    @endforeach
                                </div>

                            </div>
                        @else
                            <div class="col-span-6 sm:col-span-6 ">
                                <div class="bg-red-lightest border border-red-400 bg-red-200 text-center text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Uy, pero que ha pasao!</strong>
                                    <span class="block sm:inline">El usuario aun no tiene nigun rol. Asignale uno!</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <a type="button" href="{{route('usuarios.asignar_rol',[$user->id])}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                    Asignar rol
                                </a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seccion de estado, hecho-->
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Estado del usuario')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para visualizar el estado del usuario: ' . $user->name . ' '. $user->apellido)}}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        @if($user->estado_id != null)
                            <div class="col-span-6 sm:col-span-6 ">
                                <x-jet-label for="estado_id" value="{{ __('Estado') }}" />
                                <x-jet-input value="{{$user->estado->nombre}}" class="block mt-1 w-full" type="text" name="estado_id" required disabled />
                                <x-jet-input-error for="estado_id" class="mt-2" />
                            </div>
                        @else
                            <div class="col-span-6 sm:col-span-6 ">
                                <div class="bg-red-lightest border border-red-400 bg-red-200 text-center text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Uy, pero que ha pasao!</strong>
                                    <span class="block sm:inline">El usuario aun no tiene un estado. Agrega uno</span>
                                </span>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <a type="button" href="{{route('usuarios.asignar_estado',[$user->id])}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                    active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                    ease-in-out duration-150">
                                    Asignar estado
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
