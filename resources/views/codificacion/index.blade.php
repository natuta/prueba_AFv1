<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Codificacion') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div >
            <a type="button" href="{{route('codificacion.create')}}"
               class="inline-flex items-center px-4 py-2 bg-indigo-500 border
            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
            active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
            ease-in-out duration-150">
                {{__('Agregar codificacion')}}
            </a>

        </div>
        <div >
            <li class="divider" style="margin: 10px"></li>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Cod activo</th>
                <th>Codigo</th>
                <th>Acciones</th>
                <th colspan="2">&nbsp</th>
            </tr>
            </thead>
            <tbody>
            @foreach($codificacion as $codifica)
                <tr>
                    <td>{{$codifica->id_codificacion}}</td>
                    <td>{{$codifica->activo->nombre}}</td>
                    <td>{{$codifica->codigo}}</td>


                    @can('codificacion.destroy')
                        <td>
                            <form method="POST" action="{{route('codificacion.destroy',[$codifica->id_codificacion]) }}">
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
        <span>{{$codificacion->links()}}</span>
    </div>
</x-app-layout>
