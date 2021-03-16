<?php

namespace App\Http\Controllers;

use App\Models\Revision_Tecnica;
use App\Traits\HasBitacora;
use Illuminate\Http\Request;
use App\Models\Egreso;

class EgresoController extends Controller
{
    use HasBitacora;

    public function __construc(){
        $this->middleware('can:egresos.index')->only('index');
        $this->middleware('can:egresos.crear')->only('crear');
        $this->middleware('can:egresos.show')->only('show');
        $this->middleware('can:egresos.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egreso = Egreso::paginate(10);
        return view('egresos.index',['egresos'=>$egreso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id)
    {
        $revision = Revision_Tecnica::findOrFail($id);
        return view('egresos.create',['revision'=>$revision]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $egreso = new Egreso();
        $egreso->fecha = $request->input('fecha');
        $egreso->descripcion =  $request->input('descripcion');
        $egreso->revision_id =  $request->input('revision_id');
        $egreso->save();

        $revision = Revision_Tecnica::findOrFail($egreso->revision_id);
        $revision->conclusion = 3;
        $revision->save();

        $modelo = class_basename($egreso);
        HasBitacora::Created($modelo,$egreso->id_egreso);
        return redirect()->route('egresos.index')->with('success','el activo fijo se ha egresado correctamente');
        //return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $egreso = Egreso::findOrFail($id);
        return view('egresos.show',['egreso'=>$egreso]);
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
        $egreso = Egreso::findOrFail($id);
        $egreso->fecha = $request->input('fecha');
        $egreso->descripcion = $request->input('descripcion');
        $egreso->revision_id = $request->input('revision_id');
        $egreso->save();

        $modelo = class_basename($egreso);
        HasBitacora::Edited($modelo,$egreso->id_egreso);
        return redirect()->route('egresos.index')->with('success','El egreso se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $egreso = Egreso::findOrFail($id);

        $modelo = class_basename($egreso);
        HasBitacora::Deleted($modelo,$egreso->id_egreso);

        $egreso->delete();
        return redirect()->route('egresos.index')->with('deleted','El egreso se ha eliminado');
    }
}
