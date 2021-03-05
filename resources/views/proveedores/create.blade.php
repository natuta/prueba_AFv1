
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{__('Activos fijos/Proveedores/Agregar')}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar nuevo proveedor') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para agregar un nuevo proveedor a la lista de la empresa.')}}
            </x-slot>
        </x-jet-section-title>

        <form action="{{route('proveedores.store')}}" method="POST" class="mt-4 md:mt-0 md:col-span-2">
            @csrf
            @method("POST")
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="nombre" value="{{ __('Nombre del proveedor') }}" />
                            <x-jet-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"  autocomplete="nombre" required />
                            <x-jet-input-error for="nombre" class="mt-2" />
                        </div>

                        <div class="col-span-8 sm:col-span-4">
                            <x-select-box>
                                <x-slot name="label">
                                    escoja la opcion con componentes
                                </x-slot>
                                <x-slot name="main">
                                    @foreach($estados as $stat)
                                        <div class="option" >
                                            <option value="{{$stat->id_estado}}" required>{{$stat->nombre}}</option>
                                        </div>
                                    @endforeach
                                    <input class="inputvalue" type="text" value="" name="estado_id" id="estado_id" hidden>
                                </x-slot>
                                <x-slot name="selected">
                                    Seleccione un estado
                                </x-slot>
                            </x-select-box>
                        </div>



                        <div class="divider col-span-6 sm:col-span-6"></div>

                        <div class="col-span-6 sm:col-span-6">
                            <h6 class="font-semibold text-center underline text-gray-700 ">
                                {{__('Formulario contacto')}}
                            </h6>
                        </div>


                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="celular" value="{{ __('Celular') }}" />
                            <x-jet-input id="celular" name="celular" type="text" class="mt-1 block w-full"  autocomplete="celular" required />
                            <x-jet-input-error for="celular" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
                            <x-jet-input id="telefono" name="telefono" type="text" class="mt-1 block w-full"  autocomplete="telefono" required />
                            <x-jet-input-error for="telefono" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
                            <x-jet-input id="direccion" name="direccion" type="text" class="mt-1 block w-full"  autocomplete="direccion" required />
                            <x-jet-input-error for="direccion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="email_personal" value="{{ __('Email') }}" />
                            <x-jet-input id="email_personal" name="email_personal" type="text" class="mt-1 block w-full"  autocomplete="email_personal" required />
                            <x-jet-input-error for="email_personal" class="mt-2" />
                        </div>



                    <!-- TODO: Seria bueno agregar un boton ' agregar contacto' que al presionarlo se desplegue un formulario en el que se pueda añadir los datos de contacto.-->

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
    </div>

</x-app-layout>
