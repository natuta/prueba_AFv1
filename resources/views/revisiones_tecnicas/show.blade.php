<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Revisiones Tecnicas/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido ver la informacion de la revision tecnica con codigo:' . $revisiones->id_revision) }}
            </x-slot>
            <x-slot name="description">
                {{ __('En este formulario solo se puede consutar los datos de la revision tecnica') }}
            </x-slot>
        </x-jet-section-title>
        <form id="formulario" class="mt-4 md:mt-0 md:col-span-2">
            @csrf

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="id_revision" value="{{ __('Cod. Revision') }}" />
                            <input value="{{$revisiones->id_revision}}" type="text" name="id_revision" disabled  required>
                            <x-jet-input-error for="id_revision" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="user_id" value="{{ __('Cod. Usuario') }}" />
                            <input value="{{$revisiones->user_id}}" type="text"  name="user_id" disabled required>
                            <x-jet-input-error for="user_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="user_name" value="{{ __('Nombre usuario') }}" />
                            <input value="{{ $revisiones->user->name . ' ' . $revisiones->user->apellido  }}" type="text"  name="user_name"  disabled required>
                            <x-jet-input-error for="user_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="af_id" value="{{ __('Cod. Activo fijo') }}" />
                            <input value="{{$revisiones->AF_id}}" type="text" name="af_id" disabled required>
                            <x-jet-input-error for="af_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="AF_name" value="{{ __('Nombre activo fijo') }}" />
                            <input value="{{$revisiones->activo->nombre}}" type="text" name="AF_name" disabled required>
                            <x-jet-input-error for="AF_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="estado_id" value="{{ __('Estado de la revision tecnica') }}" />
                            <input value="{{$revisiones->estado->nombre}}" type="text" name="estado_id"  disabled required>
                            <x-jet-input-error for="estado_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                            <input value="{{$revisiones->fecha}}" type="text" name="fecha"  disabled required>
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                        @php
                        if( $revisiones->conclusion == 0){
                        $conclusion = "Reutilizar";
                        }else{
                            $conclusion = "Egresar";
                        }
                        @endphp

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="conclusion" value="{{ __('Conclusion de la revision tecnica') }}" />
                            <input value="{{$conclusion}}" type="text" name="conclusion" disabled required>
                            <x-jet-input-error for="conclusion" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <a type="button" href="{{route('revisiones_tecnicas.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
</x-app-layout>
