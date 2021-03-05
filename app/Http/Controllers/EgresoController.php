<?php

namespace App\Http\Controllers;

use App\Models\Revision_Tecnica;
use Illuminate\Http\Request;
use App\Models\Egreso;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egreso = Egreso::paginate(5);
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
        return redirect()->route('egresos.index');
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
        return redirect()->route('egresos.index');
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
        $egreso->delete();
        return redirect()->route('egresos.index');
    }
}
