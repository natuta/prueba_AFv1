<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Codificacion/crear')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar nueva codificacion') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nueva codificacion a la lista de los Activos Fijos') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('codificacion.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="id_codificaiones" value="{{ __('ID de la Codificacion') }}" />
                            <x-jet-input id="id_codificaion" name="id_codificacion" type="text" class="mt-1 block w-full"  autocomplete="id_codificacion" required />
                            <x-jet-input-error for="id_codificaion" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="AF_id" value="{{ __('Escoja el Activo Fijo') }}" />
                            <select name="AF_id" id="AF_id">
                                <option Selected> -- Escoja un Activo_Fijo -- </option>
                                @foreach($AF_id as $AFid)
                                    <option value="{{$AFid->id_AF}}">{{$AFid->nombre}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="AF_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="estado_id" value="{{ __('Escoja el estado del codigo') }}" />
                            <select name="estado_id" id="estado_id">
                                <option Selected> -- Escoja un estado -- </option>
                                @foreach($estado as $est)
                                    <option value="{{$est->id_estado}}">{{$est->nombre}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="estado_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="codigo" value="{{ __('Codigo') }}" />
                            <x-jet-input id="codigo" name="codigo" type="png" class="mt-1 block w-full"  autocomplete="codigo" required />
                            <x-jet-input-error for="codigo" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <button type="submit" href="{{route('codificacion.llenar')}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
                                ease-in-out duration-150">
                                generar code qr
                            </button>

                            <a type="button" href="{{route('codificacion.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
