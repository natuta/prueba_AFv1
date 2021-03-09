<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Mantenimientos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div >
            <li class="divider" style="margin: 10px"></li>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>#Revision</th>
                <th>Problema</th>
                <th colspan="2">&nbsp</th>
                <th>Solucion</th>
                <th colspan="2">&nbsp</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalizacion</th>
                <th>Duracion (días)</th>
                <th>Costo (Bs.)</th>
                <th>Acciones</th>
                <th colspan="2">&nbsp</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mantenimientos as $mantenimiento)
                <tr>
                    <td>{{$mantenimiento->id_mantenimiento}}</td>
                    <td>{{$mantenimiento->revision->id_revision}}</td>
                    <td>{{$mantenimiento->problema}}</td>
                    <td colspan="2">&nbsp</td>
                    <td>{{$mantenimiento->solucion}}</td>
                    <td colspan="2">&nbsp</td>
                    <td>{{$mantenimiento->fecha_inicio}}</td>
                    <td>{{$mantenimiento->fecha_fin}}</td>
                    <td>{{$mantenimiento->duracion}}</td>
                    <td>{{$mantenimiento->costo}}</td>

                    <td>
                        <a href="{{route('mantenimientos.show',[$mantenimiento->id_mantenimiento])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                            Ver
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('mantenimientos.destroy',[$mantenimiento->id_mantenimiento]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                    focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span>{{$mantenimientos->links()}}</span>
    </div>
</x-app-layout>
