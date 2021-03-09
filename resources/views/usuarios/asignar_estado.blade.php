<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Contactos/registrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
            <x-slot name="title">
                {{__('Asignar un estado')}}
            </x-slot>
            <x-slot name="description">
                {{__('Formulario para agregar el contacto del usuario: ' . $user->name . ' '. $user->apellido)}}
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
                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="direccion" value="{{ __('Seleccione el estado de la revision') }}" />
                            <select name="estado_id" required>
                                <option selected>-- Escoja un estado--</option>
                                @foreach( $estados as $estado)
                                    <option value="{{$estado->id_estado}}"> {{$estado->nombre}}  </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-5 ">
                            <button type="submit" class="underline blue-grey-text">
                                Asignar
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
</x-app-layout>
