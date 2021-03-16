
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Activos fijos/Ver')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ver informacion del activo fijo con codigo: '. $activo->id_AF) }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para ver la informacion principal de un activo fijo.') }}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                            <x-jet-input id="nombre" name="nombre" type="text" value="{{$activo->nombre}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="valor_compra" value="{{ __('Valor (Bs.)') }}" />
                            <x-jet-input id="valor_compra" name="valor_compra" type="number" value="{{$activo->valor_compra}}" step="0.01" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="valor_compra" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="fecha" value="{{ __('Actual fecha de compra') }}" />
                            <x-jet-input type="text" value="{{$activo->fecha_obtencion}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual estado') }}" />
                            <x-jet-input type="text" value="{{$activo->estado->nombre}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual categoria') }}" />
                            <x-jet-input type="text" value="{{$activo->categoria->nombre}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual departamento') }}" />
                            <x-jet-input type="text" value="{{$activo->departamento->nombre}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label value="{{ __('Actual almacen') }}" />
                            <x-jet-input type="text" value="{{$activo->almacen->direccion}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <a type="button" href="{{route('activos_fijos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ver informacion del activo fijo con codigo: '. $activo->id_AF) }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para ver la informacion respecto a revaluos de un activo fijo.') }}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        @if($cant_revisiones > 0)
                        @foreach($revisiones as $revision)
                            <div class="col-span-6 sm:col-span-6">
                                <h6 class="text-bold">Revaluo debido al mantenimiento:</h6>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="frevision_id" value="{{ __('Cod revision') }}" />
                                <x-jet-input type="text" value="{{$revision->revision_id}}" class="mt-1 block w-full" disabled />
                                <x-jet-input-error for="revision_id" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="fecha" value="{{ __('Fecha revaluo') }}" />
                                <x-jet-input type="text" value="{{$revision->fecha}}" class="mt-1 block w-full" disabled />
                                <x-jet-input-error for="fecha" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="monto" value="{{ __('Monto') }}" />
                                <x-jet-input type="text" value="{{$revision->monto}}" class="mt-1 block w-full" disabled />
                                <x-jet-input-error for="monto" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                                <x-jet-input type="text" value="{{$revision->descripcion}}" class="mt-1 block w-full" disabled />
                                <x-jet-input-error for="descripcion" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                            <br>
                            </div>

                        @endforeach
                        @else
                            <div class="col-span-6 sm:col-span-6 ">
                                <div class="bg-red-lightest border border-red-400 bg-red-200 text-center text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Uy, pero que bien vamos!</strong>
                                    <span class="block sm:inline">El activo fijo aun no tiene ninguna revision tecnica</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <a type="button" href="{{route('revisiones_tecnicas.index')}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                    Realizar revision tecnica
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ver informacion del activo fijo con codigo: '. $activo->id_AF) }}
            </x-slot>
            <x-slot name="description">
                {{ __('Codigo del activo fijo.') }}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        @if($cant_codigo > 0)
                        <div class="col-span-6 sm:col-span-6">
                            <h6 class="text-bold">Revaluo debido al mantenimiento:</h6>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="frevision_id" value="{{ __('Codigo QR') }}" />
                            <x-jet-input type="text" value="{{$codigo}}" class="mt-1 block w-full" disabled />
                            <x-jet-input-error for="revision_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <br>
                        </div>
                        @else
                            <div class="col-span-6 sm:col-span-6 ">
                                <div class="bg-red-lightest border border-red-400 bg-red-200 text-center text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Uy, pero que ha pasao!</strong>
                                    <span class="block sm:inline">El activo fijo aun no tiene codigo, agregale uno.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <a type="button" href="{{route('codificacion.index')}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                    Crear codigo
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ver informacion del activo fijo con codigo: '. $activo->id_AF) }}
            </x-slot>
            <x-slot name="description">
                {{ __('Codigo del activo fijo.') }}
            </x-slot>
        </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        @if($cant_depreciaciones > 0)
                            <div class="col-span-6 sm:col-span-6">
                                <h6 class="text-bold">Dpreciaciones del activo:</h6>
                            </div>
                            @foreach($depreciaciones as $depreciacion)
                                <div class="col-span-6 sm:col-span-6">
                                    <x-jet-label for="revision_id" value="{{ __('Descripcion') }}" />
                                    <x-jet-input type="text" value="{{$depreciacion->descripcion}}" class="mt-1 block w-full" disabled />
                                    <x-jet-input-error for="revision_id" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-jet-label for="revision_id" value="{{ __('Depreciacion acumulada') }}" />
                                    <x-jet-input type="text" value="{{$depreciacion->depreciacion_acumulada}}" class="mt-1 block w-full" disabled />
                                    <x-jet-input-error for="revision_id" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-jet-label for="revision_id" value="{{ __('Fecha') }}" />
                                    <x-jet-input type="text" value="{{$depreciacion->fecha}}" class="mt-1 block w-full" disabled />
                                    <x-jet-input-error for="revision_id" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <br>
                                </div>
                            @endforeach
                        @else
                            <div class="col-span-6 sm:col-span-6 ">
                                <div class="bg-red-lightest border border-red-400 bg-red-200 text-center text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Uy, pero que ha pasao!</strong>
                                    <span class="block sm:inline">El activo fijo aun no tiene ninguna depreciacion.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <a type="button" href="{{route('depreciacion.index')}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                    Depreciar
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
