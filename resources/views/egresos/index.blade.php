<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Egresos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div>
            <li class="divider" style="margin: 10px"></li>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th colspan="2">&nbsp</th>
                <th>Revision</th>
                <th>Acciones</th>
                <th colspan="2">&nbsp</th>
            </tr>
            </thead>
            <tbody>
            @foreach($egresos as $egreso)
                <tr>
                    <td>{{$egreso->id_egreso}}</td>
                    <td>{{$egreso->fecha}}</td>
                    <td>{{$egreso->descripcion}}</td>
                    <td colspan="2">&nbsp</td>
                    <td>{{$egreso->revision->id_revision}}</td>
                    <td>
                        <a href="{{route('egresos.show',[$egreso->id_egreso])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                            Ver
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('egresos.destroy',[$egreso->id_egreso]) }}">
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
        <span>{{$egresos->links()}}</span>
    </div>
</x-app-layout>
