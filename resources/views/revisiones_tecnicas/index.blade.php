<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Revisiones tecnicas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div >
            <a type="button" href="{{route('revisiones_tecnicas.create')}}"
               class="inline-flex items-center px-4 py-2 bg-indigo-500 border
            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
            active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
            ease-in-out duration-150">
                {{__('Nueva revision tecnica')}}
            </a>

        </div>
        <div>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>#</th>
                    <th>#Mantenimiento</th>
                    <th>Nombre usuario</th>
                    <th>Activo fijo</th>
                    <th>Fecha</th>
                    <th>Conclusion</th>
                    <th>Acciones</th>
                    <th colspan="4">&nbsp</th>

                </tr>
                </thead>
                <tbody>
                @foreach($revisiones as $rev)
                    <tr>
                        <td>{{$rev->id_revision}}</td>
                        <td>{{$rev->mantenimiento->id_mantenimiento}}</td>
                        <td>{{$rev->user->name}} {{$rev->user->apellido}} </td>
                        <td>{{$rev->activo->nombre}}</td>
                        <td>{{$rev->fecha}}</td>
                        @if( $rev->conclusion == 0)
                            <td>Conservable</td>
                        @else
                            <td>Egresable</td>
                        @endif
                        <td width="10px">
                            <a href="{{route('revisiones_tecnicas.show',[$rev->id_revision])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                Ver
                            </a>
                        </td>
                        @if( $rev->conclusion == 0)
                        <td width="10px">
                            <a href="{{route('mantenimientos.edit',[$rev->mantenimiento->id_mantenimiento])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                Finalizar Mant.
                            </a>
                        </td>
                        @else

                        <td width="10px">
                            <a href="{{route('egresos.crear',[$rev->id_revision])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                Egresar
                            </a>
                        </td>
                        @endif
                        <td width="10px">
                            <form method="POST" action="{{route('revisiones_tecnicas.destroy',[$rev->id_revision]) }}">
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
            <span>{{$revisiones->links()}}</span>
        </div>
    </div>
    <!-- <div>
         <x-slot name="footer">
             this is the footer
         </x-slot>
     </div> -->
</x-app-layout>
