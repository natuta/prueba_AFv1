<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Revaluos/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido ver la informacion del Revaluo') }}
            </x-slot>
            <x-slot name="description">
                {{ __('En este formulario tambien es posible editar la información') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('revaluos.show',[$revaluo->id_revaluo])}}" method="POST" id="formulario" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="revision_id" value="{{ __('Revision tecnica') }}" />
                            <input value="Cod: {{$revaluo->revision->id_revision}}" type="text" name="revision_id" class="form-control" disabled required>
                            <x-jet-input-error for="revision_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="af_id" value="{{ __('Cod. Activo fijo') }}" />
                            <input value="{{$revaluo->AF_id}}" type="text" name="af_id" disabled required>
                            <x-jet-input-error for="af_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="AF_name" value="{{ __('Nombre activo fijo') }}" />
                            <input value="{{$revaluo->activo->nombre}}" type="text" name="AF_name" disabled required>
                            <x-jet-input-error for="AF_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="descripcion" value="{{ __('Descripcion de la Revalorizacion') }}" />
                            <input value="{{$revaluo->descripcion}}" type="text" id="input" name="descripcion" class="form-control" disabled required>
                            <x-jet-input-error for="descripcion" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="valor" value="{{ __('Valor del Revaluo') }}" />
                            <input value="{{$revaluo->monto}}" type="text"  name="valor" class="form-control" disabled required>
                            <x-jet-input-error for="valor" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="fecha" value="{{ __('Fecha de Revaluo') }}" />
                            <input value="{{$revaluo->fecha}}" type="text"  name="fecha" class="form-control" disabled required>
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>

                   
                              

                       

                        <div class="col-span-6 sm:col-span-4">
                            <a type="button" href="{{route('revaluos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
