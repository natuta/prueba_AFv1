<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Codificacion') }}
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
                <th>AF_id</th>
                <th>Codigo</th>
                <th>estado_id</th>
                <th colspan="2">&nbsp</th>
            </tr>
            </thead>
            <tbody>
            @foreach($codificaciones as $codificacion)
                <tr>
                    <td>{{$codificacion->id_codificacion}}</td>
                    <td>{{$codificacion->activos_fijos->id_AF}}</td>
                    <td>{{$codificacion->codigo}}</td>
                    <td>{{$codificacion->estados->id_estado}}</td>
                @can('codificacion.show')
                        <td>
                            <a href="{{route('codificacion.show',[$codificacion->id_codificacion])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                Ver
                            </a>
                        </td>
                    @endcan
                    @can('codificacion.destroy')
                        <td>
                            <form method="POST" action="{{route('codificacion.destroy',[$codificacion->id_codificacion]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                    focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">Eliminar</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
        <span>{{$codificaciones->links()}}</span>
    </div>
</x-app-layout>
