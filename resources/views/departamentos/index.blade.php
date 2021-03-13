<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Departamentos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="alert alert-dark" role="success">
                {{session('success')}}
            </div>
        @endif
        <div >
            @can('departamentos.create')
            <a type="button" href="{{route('departamentos.create')}}"
               class="inline-flex items-center px-4 py-2 bg-indigo-500 border
            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
            active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
            ease-in-out duration-150">
                {{__('Agregar departamento')}}
            </a>
            @endcan
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th colspan="2">&nbsp</th>
                <th>Edificio</th>
                <th>Acciones</th>
                <th colspan="2">&nbsp</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departamento as $dpto)
                <tr>
                    <td>{{$dpto->id_departamento}}</td>
                    <td>{{$dpto->nombre}}</td>
                    <td>{{$dpto->descripcion}}</td>
                    <th colspan="2">&nbsp</th>
                    <td>{{$dpto->edificio->nombre}}</td>
                    @can('departamentos.show')
                    <td>
                        <a href="{{route('departamentos.show',[$dpto->id_departamento])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                            Ver
                        </a>
                    </td>
                    @endcan
                    @can('departamentos.destroy')
                    <td>
                        <form method="POST" action="{{route('departamentos.destroy',[$dpto->id_departamento]) }}">
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
            <span>{{$departamento->links()}}</span>
    </div>
    <!-- <div>
         <x-slot name="footer">
             this is the footer
         </x-slot>
     </div> -->
</x-app-layout>
