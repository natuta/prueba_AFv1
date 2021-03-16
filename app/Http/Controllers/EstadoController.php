<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Traits\HasBitacora;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    use HasBitacora;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('can:estados.index')->only('index');
        $this->middleware('can:estados.create')->only('create');
        $this->middleware('can:estados.show')->only('show');
        $this->middleware('can:estados.edit')->only('edit');
        $this->middleware('can:estados.destroy')->only('destroy');
    }
    public function index()
    {
        $status = Estado::paginate(10);
        return view('estados.index',['status'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stat = new Estado();
        $stat->nombre = $request->input('nombre');
        $stat->descripcion = $request->input('descripcion');
        $stat->save();

        $modelo = class_basename($stat);
        HasBitacora::Created($modelo,$stat->id_estado);

        return redirect()->route('estados.index')->with('success','Estado registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = Estado::findOrFail($id);
        return view('estados.show',['status'=>$status]);
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
        $stat = Estado::findOrFail($id);
        $stat->nombre = $request->input('nombre');
        $stat->descripcion = $request->input('descripcion');
        $stat->save();

        $modelo = class_basename($stat);
        HasBitacora::Edited($modelo,$stat->id_estado);

        return redirect()->route('estados.index')->with('success','El estado se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stat = Estado::findOrFail($id);
        $modelo = class_basename($stat);
        HasBitacora::Deleted($modelo,$stat->id_estado);
        $stat->delete();
        return redirect()->route('estados.index')->with('deleted','El estado se ha eliminado');
    }
}
