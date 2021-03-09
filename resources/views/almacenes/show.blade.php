<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Almacenes/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido mirar la informacion del almacen '). $almacenes->id_almacen }}
            </x-slot>
            <x-slot name="description">
                {{ __('En este formulario tambien es posible editar la información del almacen con codigo: ') . $almacenes->id_almacen }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('almacenes.update',[$almacenes->id_almacen])}}" method="POST" id="formulario" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="direccion" value="{{ __('Direccion del almacen') }}" />
                            <input value="{{$almacenes->direccion}}" type="text" id="input" name="direccion" class="form-control" disabled="" autocomplete="direccion" required>
                            <x-jet-input-error for="direccion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="estado" value="{{ __('Estado del almacen') }}" />
                            <input value="{{$almacenes->estado}}" type="text" id="input" name="estado" class="form-control" disabled="" autocomplete="estado" required>
                            <x-jet-input-error for="estado" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            @can('almacenes.edit')
                                <a type="button" class="inline-flex items-center px-4 py-2 bg-green-400
                                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                                active:bg-gray-50 transition ease-in-out duration-150" onclick="habilitarinputs()">
                                    Editar
                                </a>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150" id="input" disabled="">
                                    Actualizar
                                </button>
                            @endcan

                            <a type="button" href="{{route('almacenes.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
    <x-jet-section-title>
        <x-slot name="title">
            {{ __('Mas informacion del almacen con codigo: '). $almacenes->id_almacen }}
        </x-slot>
        <x-slot name="description">
            {{ __('Lista de activos fijos que se encuentran en el almacen: ') . $almacenes->id_almacen }}
        </x-slot>
    </x-jet-section-title>
        <div class="mt-4 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        @if($cantidad > 0)
                        <div class="col-span-6 sm:col-span-6">
                            <ul class="pt-3">Lista activos fijos en el almacen  </ul>
                            @foreach( $activos as $perm)
                                <li class="pl-sm-5 pl-5 pt-2">
                                    <a href="{{route('activos_fijos.show',$perm->id_AF)}}">{{$perm->nombre}}</a>
                                </li>
                            @endforeach
                        </div>
                        @else
                        <div class="col-span-6 sm:col-span-6 ">
                            <div class="bg-red-lightest border border-red-400 bg-red-200 text-center text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Uy, pero que ha pasao!</strong>
                                <span class="block sm:inline">El almacen aun no tiene nigun activo fijo. Agregale uno!</span>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function habilitarinputs(){
            form = document.forms['formulario'];
            for(i=0;ele=form.elements[i];i++){
                ele.disabled=false;
            }
        }

    </script>
</x-app-layout>
