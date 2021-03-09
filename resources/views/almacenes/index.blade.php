<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Almacenes') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-400-lightest border border-green-600 bg-green-200 text-center text-green-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                </div>
            @endif
        <div class="pt-5">
            @can('almacenes.create')

            <a type="button" href="{{route('almacenes.create')}}"
               class="inline-flex items-center px-4 py-2 bg-indigo-500 border
            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
            active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
            ease-in-out duration-150">
                {{__('Agregar Almacenes')}}
            </a>
            @endcan

            <li class="divider" style="margin: 10px"></li>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>Direccion del almacen</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th colspan="2">&nbsp</th>
            </tr>
            </thead>
            <tbody>
            @foreach($almacenes as $almacen)
                <tr>
                    <td>{{$almacen->id_almacen}}</td>
                    <td>{{$almacen->direccion}}</td>
                    <td>{{$almacen->estado}}</td>
                    @can('almacenes.show')
                        <td width="10px">
                            <a href="{{route('almacenes.show',[$almacen->id_almacen])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                Ver
                            </a>
                        </td>
                    @endcan
                    @can('almacenes.destroy')
                    <td width="10px">
                        <form method="POST" action="{{route('almacenes.destroy',[$almacen->id_almacen]) }}">
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
        <span>{{$almacenes->links()}}</span>
    </div>
</x-app-layout>

