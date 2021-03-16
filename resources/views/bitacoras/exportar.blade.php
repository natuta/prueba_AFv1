<style>
    table th td {
        border: 1px;
        border-color: red;
        padding:5px;
    }
</style>
    <div class="">
        <table class="table table-bordered">
            <thead class="border">
            <tr>
                <th>#</th>
                <th>Accion</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Descripcion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bitacoras as $bit)
                <tr>
                    <td>{{$bit->id_bitacora}}</td>
                    <td>{{$bit->accion->nombre}}</td>
                    <td>{{$bit->user->name . ' '.$bit->user->apellido }}</td>
                    <td>{{$bit->fecha }}</td>
                    <td>{{$bit->descripcion}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
