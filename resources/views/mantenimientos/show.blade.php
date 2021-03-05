<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos Fijos/Mantenimientos/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Ha escogido ver la informacion del mantenimiento') }}
            </x-slot>
            <x-slot name="description">
                {{ __('En este formulario tambien es posible editar la información') }}
            </x-slot>
        </x-jet-section-title>
        <form action="{{route('mantenimientos.update',[$mantenimiento->id_mantenimiento])}}" method="POST" id="formulario" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("PUT")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="problema" value="{{ __('Problema del mantenimiento') }}" />
                            <input value="{{$mantenimiento->problema}}" type="text" id="input" name="problema" class="form-control" disabled required>
                            <x-jet-input-error for="problema" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="solucion" value="{{ __('Solucion del mantenimiento') }}" />
                            <input value="{{$mantenimiento->solucion}}" type="text"  name="solucion" class="form-control" disabled required>
                            <x-jet-input-error for="solucion" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="fecha_inicio" value="{{ __('Fecha de inicio') }}" />
                            <input value="{{$mantenimiento->fecha_inicio}}" type="text"  name="fecha_inicio" class="form-control" disabled required>
                            <x-jet-input-error for="fecha_inicio" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="fecha_fin" value="{{ __('Fecha de finalizacion') }}" />
                            <input value="{{$mantenimiento->fecha_fin}}" type="text"  name="fecha_fin" class="form-control" disabled required>
                            <x-jet-input-error for="fecha_fin" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="duracion" value="{{ __('Duracion') }}" />
                            <input value="{{$mantenimiento->duracion}} días" type="text"  name="duracion" class="form-control" disabled required>
                            <x-jet-input-error for="duracion" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="costo" value="{{ __('Costo del mant.') }}" />
                            <input value="Bs. {{$mantenimiento->costo}}" type="text" name="costo" class="form-control" disabled required>
                            <x-jet-input-error for="costo" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <x-jet-label for="revision_id" value="{{ __('Revision tecnica') }}" />
                            <input value="Cod: {{$mantenimiento->revision->id_revision}}" type="text" name="revision_id" class="form-control" disabled required>
                            <x-jet-input-error for="revision_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <a type="button" href="{{route('mantenimientos.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
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
