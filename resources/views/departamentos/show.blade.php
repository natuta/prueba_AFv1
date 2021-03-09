<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Departamentos/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido mirar la infdptoon del departmaneto '). $dpto->nombre }}
            </x-slot>
            <x-slot name="description">
                {{ __('En este formulario tambien es posible editar la información de ') . $dpto->nombre }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('departamentos.update',[$dpto->id_departamento])}}" method="POST" id="formulario" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="nombre" value="{{ __('Nombre de la ciudad') }}" />
                            <input value="{{$dpto->nombre}}" type="text" id="input" name="nombre" class="form-control" disabled="" autocomplete="nombre" required>
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                            <input value="{{$dpto->descripcion}}" type="text" id="input" name="descripcion" class="form-control" disabled="" autocomplete="nombre" required>
                            <x-jet-input-error for="descripcion" class="mt-2" />
                        </div>
                        <div class="col-span-8 sm:col-span-4">
                            <x-select-box>
                                <x-slot name="label">
                                    escoja la opcion
                                </x-slot>
                                <x-slot name="main">
                                    @foreach($edificios as $stat)
                                        <div class="option" >
                                            <option value="{{$stat->id_edificio}}" required> {{ $stat->ciudad->nombre }} - <span> {{$stat->nombre}} </span> </option>
                                        </div>
                                    @endforeach
                                    <input class="inputvalue" type="text" id="inputvalue" name="edificio_id" value="" hidden>
                                </x-slot>
                                <x-slot name="selected">
                                    Seleccione un edificio
                                </x-slot>
                            </x-select-box>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
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
                            <a type="button" href="{{route('departamentos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
    <script type="text/javascript">
        function habilitarinputs(){
            form = document.forms['formulario'];
            for(i=0;ele=form.elements[i];i++){
                ele.disabled=false;
            }
        }

    </script>
</x-app-layout>
