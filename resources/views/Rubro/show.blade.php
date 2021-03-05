<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Rubros/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido mirar la informacion del rubro') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario ') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('rubros.update',[$rubro->id_rubro])}}" method="POST" id="formulario" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="nombre" value="{{ __('Nombre del rubro') }}" />
                            <input value="{{$rubro->nombre}}" type="text" id="input" name="nombre" class="form-control" disabled="" autocomplete="nombre" required>
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion del rubro') }}" />
                            <input value="{{$rubro->descripcion}}" type="text" id="input" name="descripcion" class="form-control" disabled="" autocomplete="descripcion" required>
                            <x-jet-input-error for="descripcion" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">

                            <div class="flex flex-col mb-4 md:w-1/2">
                                <x-jet-label for="vida_util" value="{{ __('Vida Util') }}" />
                                <input value="{{$rubro->vida_util}}" type="text" id="input" name="vida_util" class="form-control" disabled="" autocomplete="vida_util" required>
                                <x-jet-input-error for="vida_util" class="mt-2" />
                            </div>

                            <div class="flex flex-col mb-4 md:w-1/2">
                                <x-jet-label for="coeficiente_depr" value="{{ __('Coeficiente de depreciacion') }}" />
                                <input value="{{$rubro->coeficiente_depr}}" type="text" id="input" name="coeficiente_depr" class="form-control" disabled="" autocomplete="coeficiente_depr" required>
                                <x-jet-input-error for="coeficiente_depr" class="mt-2" />
                            </div>

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
                            <a type="button" href="{{route('rubros.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
