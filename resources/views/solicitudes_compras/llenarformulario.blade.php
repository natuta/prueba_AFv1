<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Movimientos/Registrar/verificar informacion')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Registrar una nueva solicitud de compra') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para registrar una solicitud de compra ya sea de un nuevo activo fijo o un activo fijo ya existente') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{ route('compras.store') }}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="usuario_id" value="{{ __('Cod. del usuario') }}" />
                            <input value="{{auth()->user()->id}}" type="text" name="user_id" class="form-control" readonly required>
                            <x-jet-input-error for="usuario_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="usuario_name" value="{{ __('Nombre del usuario') }}" />
                            <input value="{{auth()->user()->name}} {{auth()->user()->apellido}}" type="text" name="usuario_name" disabled readonly class="form-control"  required>
                            <x-jet-input-error for="usuario_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="" value="{{__('Cod. proveedor')}}" />
                            <input value="{{ $proveedor->id_proveedor }}" type="text" name="proveedor_id" readonly class="form-control"  required>
                            <x-jet-input-error for="" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="" value="{{__('Nombre proveedor')}}" />
                            <input value="{{ $proveedor->nombre }}" type="text" name="proveedor_name" disabled readonly class="form-control"  required>
                            <x-jet-input-error for="" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="" value="{{__('Fecha')}}" />
                            <input value="{{$fecha}}" type="text" name="fecha"  readonly class="form-control"  required>
                            <x-jet-input-error for="" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="nombre" value="{{__('Nombre del activo fijo *')}}" />
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del activo fijo que se comprará" required>
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="" value="{{__('Costo (Bs.) * ')}}" />
                            <input type="text" name="costo" class="form-control" placeholder="Costo monetario" required>
                            <x-jet-input-error for="costo" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="cantidad" value="{{__('Cantidad * ')}}" />
                            <input type="text" name="cantidad" class="form-control" placeholder="Unidades" required>
                            <x-jet-input-error for="cantidad" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="categoria_id" value="{{__('Cod. categoria')}}" />
                            <input value="{{ $categoria->id_categoria }}" type="text" name="categoria_id" readonly class="form-control"  required>
                            <x-jet-input-error for="categoria_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="categoria_name" value="{{__('Nombre de la categoria')}}" />
                            <input value="{{ $categoria->nombre }}" type="text" name="categoria_name" readonly class="form-control"  required>
                            <x-jet-input-error for="categoria_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="detalle" value="{{__('Detalle * ')}}" />
                            <input type="text" name="detalle" class="form-control"  required>
                            <x-jet-input-error for="detalle" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('compras.create')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Atras
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
