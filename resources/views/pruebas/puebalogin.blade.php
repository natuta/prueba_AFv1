<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/depreciacion/Agregar')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar nuevo depreciacion') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nueva depreciacion a la lista de la empresa.')}}
            </x-slot>
        </x-jet-section-title>

        <form action="{{route('depreciacion.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="depreciacion_acumulada" value="{{ __('depreciacion acumulada') }}" />
                            <x-jet-input id="depreciacion_acumulada" name="depreciacion_acumulada" type="text" class="mt-1 block w-full"  autocomplete=$devaluos required />
                            <x-jet-input-error for="depreciacion_acumulada" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                            <x-jet-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"  autocomplete="descripcion" required />
                            <x-jet-input-error for="descripcion" class="mt-2" />
                        </div>

                        <div class="col-span-8 sm:col-span-4">
                            <select name="" id="">
                                <option value="selected">Seleccione algo</option>
                                @foreach($depreciacion as $stat)
                                        <option value="{{$stat->id_depreciacion}}" required> {{ $stat->AF_id ->nombre }} - <span> {{$stat->nombre}} </span> </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="inputvalue2">Cod. activo seleccionada</x-jet-label>
                            <input type="text" id="inputvalue2" value="" readonly>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit"  class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                Registrar
                            </button>
                            <a type="button" href="{{route('depreciacion.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
