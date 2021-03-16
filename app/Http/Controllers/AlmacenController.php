<?php

namespace App\Http\Controllers;

use App\Models\Activo_Fijo;
use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function __construct(){
        $this->middleware('can:almacenes.index')->only('index');
        $this->middleware('can:almacenes.create')->only('create');
        $this->middleware('can:almacenes.show')->only('show');
        $this->middleware('can:almacenes.edit')->only('edit');
        $this->middleware('can:almacenes.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = Almacen::paginate(5);
        return view('almacenes.index',['almacenes'=>$almacenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacenes = new Almacen();
        $almacenes->direccion = $request->input('direccion');
        $almacenes->estado = $request->input('estado');
        $almacenes->save();
        return redirect()->route('almacenes.index')->with('success','El almacen ha sido registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $almacen = Almacen::findOrFail($id);
        $activos = Activo_Fijo::all()->where('almacen_id','==',$id);
        $cantidad = count($activos);
        //return dd($activos,$almacen,$cantidad);
        return view('almacenes.show',['almacenes' => $almacen,'activos'=> $activos,'cantidad'=> $cantidad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $almacenes = Almacen::findOrFail($id);
        $almacenes->direccion = $request->input('direccion');
        $almacenes->save();
        return redirect()->route('almacenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almacenes = Almacen::findOrFail($id);
        $almacenes->delete();
        return redirect()->route('almacenes.index');
    }
}
