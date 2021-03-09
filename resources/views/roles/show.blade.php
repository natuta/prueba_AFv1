<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Privilegios/Roles/Mostrar') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10 md:grid md:grid-cols-3 md:gap-6 ">
        <x-jet-section-title>
            <x-slot name="title">
                {{ __('Agregar un nuevo rol') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Formulario para edi un nuevo rol con determinados permisos.') }}
            </x-slot>
        </x-jet-section-title>
        <div class="overflow-hidden shadow-md rounded-md">
            <!-- card header -->
            <div class="px-6 py-4 bg-white border-b border-gray-200 font-bold uppercase">
                {{$rol->name}}
            </div>
            <div class="p-6 bg-white border-b border-gray-200">
                <ul>Lista de permisos del rol {{$rol->name}} </ul>
                @foreach( $permisos as $perm)
                    <li>
                        {{$perm->description}}
                    </li>
                @endforeach
            </div>
            <div class="p-6 bg-white border-gray-200 text-right">
                <a type="button" href="{{route('roles.index')}}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                                focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                    Cancelar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
