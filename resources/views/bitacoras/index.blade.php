<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Bitacoras') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div >

                <a type="button" href="{{route('bitacoras.descargar')}}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-500 border
            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
            active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
            ease-in-out duration-150">
                    {{__('Exportar')}}
                </a>

            <li class="divider" style="margin: 10px"></li>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Accion</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th colspan="2">&nbsp</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bitacoras as $bit)
                <tr>
                    <td>{{$bit->id_bitacora}}</td>
                    <td>{{$bit->accion->nombre}}</td>
                    <td>{{$bit->user->name . ' '.$bit->user->apellido }}</td>
                    <td>{{$bit->fecha}}</td>
                    <td>{{$bit->descripcion}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
