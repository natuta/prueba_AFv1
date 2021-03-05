<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Movimientos/Registrar/verificar informacion')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Registrar un nuevo movimiento') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para registrar un movimiento de un activo fijo de un departamento a otro') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{ route('movimientos.store') }}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="usuario_id" value="{{ __('Cod. del usuario') }}" />
                            <input value="{{auth()->user()->id}}" type="text" name="user_id" class="form-control" readonly disabled required>
                            <x-jet-input-error for="usuario_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="usuario_name" value="{{ __('Nombre del usuario') }}" />
                            <input value="{{auth()->user()->name}} {{auth()->user()->apellido}}" type="text" name="usuario_name" disabled readonly class="form-control"  required>
                            <x-jet-input-error for="usuario_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="af_id" value="{{ __('Cod. del activo') }}" />
                            <input value="{{$activo->id_AF}}" type="text" name="af_id" class="form-control" readonly   required>
                            <x-jet-input-error for="af_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="af_nombre" value="{{ __('Nombre del activo fijo') }}" />
                            <input value="{{$activo->nombre}}" type="text" name="af_nombre" class="form-control" readonly disabled required>
                            <x-jet-input-error for="af_nombre" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <input type="number" name="cantidad" class="form-control" placeholder="Unidades"  required>
                            <x-jet-input-error for="cantidad" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="origen_id" value="{{ __(' Cod. Dpto de origen') }}" />
                            <input value="{{$activo->departamento_id}}" type="text" name="origen_dpto" id="origen_dpto" class="form-control" readonly  required>
                            <x-jet-input-error for="origen_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="destino_id" value="{{ __(' Cod. Dpto de destino') }}" />
                            <input value="{{$dpto->id_departamento}}" type="text" name="destino_dpto" id="destino_id" class="form-control" readonly  required>
                            <x-jet-input-error for="destino_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="fecha" value="{{ __(' Fecha') }}" />
                            <input value="{{ $fecha }}" type="text" name="fecha" class="form-control" readonly disabled required>
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>



                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="nombre_dpto_origen" value="{{ __('Nombre Dpto. de origen') }}" />
                            <input value="{{$activo->departamento->nombre}}" type="text"  name="nombre_dpto_origen" class="form-control" readonly disabled required>
                            <x-jet-input-error for="nombre_dpto_origen" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="nombre_dpto_destino" value="{{ __('Nombre Dpto. de destino') }}" />
                            <input value="{{$dpto->nombre}}" type="text" name="nombre_dpto_destino" class="form-control"  readonly disabled required>
                            <x-jet-input-error for="nombre_dpto_destino" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('movimientos.create')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
