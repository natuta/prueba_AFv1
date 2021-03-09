
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Activos fijos/crear')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Editar informacion del activo fijo con codigo: '. $activo->id_AF) }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para editar la informacion principal de un activo fijo.') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('activos_fijos.update',$activo->id_AF)}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                            <x-jet-input id="nombre" name="nombre" type="text" value="{{$activo->nombre}}" class="mt-1 block w-full" required />
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="valor_compra" value="{{ __('Valor (Bs.)') }}" />
                            <x-jet-input id="valor_compra" name="valor_compra" type="number" value="{{$activo->valor_compra}}" step="0.01" class="mt-1 block w-full" required />
                            <x-jet-input-error for="valor_compra" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="fecha" value="{{ __('Actual fecha de compra') }}" />
                            <x-jet-input type="text" value="{{$activo->fecha_obtencion}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="fecha" value="{{ __('Nueva fecha de compra') }}" />
                            <x-jet-input id="fecha" name="fecha" type="date" class="mt-1 block w-full" required />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual estado') }}" />
                            <x-jet-input type="text" value="{{$activo->estado->nombre}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="estado_id" value="{{ __('Seleccione un nuevo estado') }}" />
                            <select name="estado_id" >
                                <option selected>-- Escoja un estado--</option>
                                @foreach( $estados as $depto)
                                    <option value="{{$depto->id_estado}}">{{$depto->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual categoria') }}" />
                            <x-jet-input type="text" value="{{$activo->categoria->nombre}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="categoria_id" value="{{ __('Seleccione una nueva categoria') }}" />
                            <select name="categoria_id">
                                <option selected>-- Escoja una categoria--</option>
                                @foreach( $categorias as $depto)
                                    <option value="{{$depto->id_categoria}}">{{$depto->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual departamento') }}" />
                            <x-jet-input type="text" value="{{$activo->departamento->nombre}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="dpto_id" value="{{ __('Seleecione un nuevo departamento') }}" />
                            <select name="dpto_id">
                                <option selected>-- Escoja un departamento--</option>
                                @foreach( $dptos as $depto)
                                    <option value="{{$depto->id_departamento}}">{{$depto->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual almacen') }}" />
                            <x-jet-input type="text" value="{{$activo->almacen->direccion}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="almacen_id" value="{{ __('Seleecione un nuevo almacen') }}" />
                            <select name="almacen_id">
                                <option selected>-- Escoja un almacen--</option>
                                @foreach( $almacenes as $depto)
                                    <option value="{{$depto->id_almacen}}">{{$depto->direccion}} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('activos_fijos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
