
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Departamento/Agregar')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar nuevo departamento') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nuevo departamento a la lista de la empresa.')}}
            </x-slot>
        </x-jet-section-title>

        <form action="{{route('departamentos.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="nombre" value="{{ __('Nombre del departmamento') }}" />
                            <x-jet-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"  autocomplete="nombre" required />
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                            <x-jet-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"  autocomplete="descripcion" required />
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

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="inputvalue2">Cod. ciudad seleccionada</x-jet-label>
                            <input type="text" id="inputvalue2" value="" readonly>
                        </div>

                        @php
                            $edificios = \App\Models\Edificio::all()->where('ciudad_id','=','3');
                        @endphp
<!--                        <livewire:edificios :edificios="$edificios" /> -->

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('proveedores.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            var selected2 = document.querySelector(".selected");
            var inputvalue2 = document.getElementById("inputvalue");
            var inputvalue3 = document.getElementById("inputvalue2");
            var aux;

            optionsList.forEach(o => {
                o.addEventListener("click", () => {
                    selected2.value = o.querySelector("option").value;
                    //console.log(inputvalue2);
                    aux = selected2.value;
                    inputvalue3.value = aux;
                    console.log(inputvalue3.value);
                });
            });
        </script>
    </div>
</x-app-layout>
