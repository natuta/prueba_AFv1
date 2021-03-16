<?php

namespace App\Http\Controllers;

use App\Models\Activo_Fijo;
use App\Models\Almacen;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\Estado;
use App\Models\Revaluo;
use App\Models\Revision_Tecnica;
use Illuminate\Http\Request;

class ActivoController extends Controller
{
    public function __construct(){
        $this->middleware('can:activos.index')->only('index');
        $this->middleware('can:activos.create')->only('create');
        $this->middleware('can:activos.show')->only('show');
        $this->middleware('can:activos.edit')->only('edit');
        $this->middleware('can:activos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Activo_Fijo::paginate(5);
        return view('activos.index',['activos'=>$activos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados= Estado::all();
        $categorias = Categoria::all();
        $dptos = Departamento::all();
        $almacenes = Almacen::all();
        return view('activos.create',[
            'estados'=> $estados,
            'categorias' => $categorias,
            'dptos' => $dptos,
            'almacenes'=> $almacenes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activo = new Activo_Fijo();
        $activo->nombre = $request->input('nombre');
        $activo->fecha_obtencion = $request->input('fecha');
        $activo->valor_compra = $request->input('valor_compra');
        $activo->estado_id = $request->input('estado_id');
        $activo->categoria_id = $request->input('categoria_id');
        $activo->departamento_id = $request->input('dpto_id');
        $activo->almacen_id = $request->input('almacen_id');
        $activo->save();

        return redirect()->route('activos_fijos.index')->with('success','Activo fijo registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activo = Activo_Fijo::findOrFail($id);
        $revisiones = Revaluo::all()->where('AF_id','=',$id);
        return view('activos.show',['activo'=>$activo,'revisiones'=>$revisiones]);
        //return dd($revisiones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activos = Activo_Fijo::findOrFail($id);
        $estados= Estado::all();
        $categorias = Categoria::all();
        $dptos = Departamento::all();
        $almacenes = Almacen::all();
        return view('activos.edit',[
            'activo'=> $activos,
            'estados'=> $estados,
            'categorias' => $categorias,
            'dptos' => $dptos,
            'almacenes'=> $almacenes
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activo = Activo_Fijo::findOrFail($id);
        $activo->nombre = $request->input('nombre');
        $activo->fecha_obtencion = $request->input('fecha');
        $activo->valor_compra = $request->input('valor_compra');
        $activo->estado_id = $request->input('estado_id');
        $activo->categoria_id = $request->input('categoria_id');
        $activo->departamento_id = $request->input('dpto_id');
        $activo->almacen_id = $request->input('almacen_id');
        $activo->save();

        return redirect()->route('activos_fijos.index')->with('success','Activo fijo editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activo = Activo_Fijo::findOrFail($id);
        $activo->delete();
        return redirect()->route('activos_fijos.index');
    }
}
