<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Usuarios') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="alert alert-dark" role="success">
                {{session('success')}}
            </div>
        @endif
        <div >
            <a type="button" href="{{route('usuarios.create')}}"
               class="inline-flex items-center px-4 py-2 bg-indigo-500 border
            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
            active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition
            ease-in-out duration-150">
                {{__('Registrar usuario')}}
            </a>
            <li class="divider" style="margin: 10px"></li>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apelido</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Acciones</th>
                    <th colspan="2">&nbsp</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    @if($us->email_verified_at == null)
                        <tr>
                            <td>{{$us->name}}</td>
                            <td>{{$us->apellido}}</td>
                            <td>{{$us->sexo}}</td>
                            <td>{{$us->email}}</td>
                            <td>
                                <a href="{{route('usuarios.show',[$us->id])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                    Ver
                                </a>
                            </td>

                            <td>
                                <a href="{{route('usuarios.habilitar',[$us->id])}}" class="inline-flex items-center px-4 py-2 bg-yellow-300
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                    Habilitar
                                </a>
                            </td>

                            <td>
                                <form method="POST" action="{{route('usuarios.destroy',[$us->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                    focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">Eliminar</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <span>{{$user->links()}}</span>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apelido</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Acciones</th>
                    <th colspan="3">&nbsp</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    @if($us->email_verified_at != null )
                        <tr>
                            <td>{{$us->name}}</td>
                            <td>{{$us->apellido}}</td>
                            <td>{{$us->sexo}}</td>
                            <td>{{$us->email}}</td>
                            <td width="10px">
                                <a href="{{route('usuarios.show',[$us->id])}}" class="inline-flex items-center px-4 py-2 bg-green-400
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                    Ver
                                </a>
                            </td>

                            <td width="10px">
                                <a href="{{route('usuarios.deshabilitar',[$us->id])}}" class="inline-flex items-center px-4 py-2 bg-yellow-300
                border border-gray-300 rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest shadow-sm
                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                active:bg-gray-50 transition ease-in-out duration-150" >
                                    Deshabilitar
                                </a>
                            </td>

                            <td width="10px">
                                <form method="POST" action="{{route('usuarios.destroy',[$us->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border
                    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
                    focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">Eliminar</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <span>{{$user->links()}}</span>
        </div>

    </div>
</x-app-layout>
