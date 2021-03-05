<?php

namespace App\Http\Controllers;

use App\Models\Revision_Tecnica;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Mantenimiento;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mantenimiento = Mantenimiento::paginate(5);
        return view('mantenimientos.index',['mantenimientos'=>$mantenimiento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mantenimiento = new Mantenimiento();
        $mantenimiento->problema = $request->input('problema');
        $mantenimiento->solucion = $request->input('solucion');
        $mantenimiento->fecha_inicio = $request->input('fecha_inicio');
        $mantenimiento->fecha_fin = $request->input('fecha_fin');
        $mantenimiento->duracion = $request->input('duracion');
        $mantenimiento->costo = $request->input('costo');
        $mantenimiento->revision_id = $request->input('revision_id');
        $mantenimiento->save();
        return redirect()->route('mantenimientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        return view('mantenimientos.show',['mantenimiento'=>$mantenimiento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mantenimineto = Mantenimiento::findOrFail($id);
        return view('mantenimientos.edit',['mantenimiento'=> $mantenimineto]);
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
        $mantenimiento = Mantenimiento::findOrFail($id);
        $revision = Revision_Tecnica::findOrFail($mantenimiento->revision_id);

        $duracion = $mantenimiento->fecha_inicio->diffInDays($request->fecha_fin);

        if( $request->fecha_fin < $mantenimiento->fecha_inicio ){
            //return dd($mantenimiento,$duracion);
            return redirect()->route('mantenimientos.edit',['mantenimiento'=>$mantenimiento])->with('danger','La fecha final no puede ser anerior a la fecha de incio','fecha_fin');
        }else{
            $mantenimiento->problema = $request->input('problema');
            $mantenimiento->solucion = $request->input('solucion');
            $mantenimiento->fecha_fin = $request->input('fecha_fin');
            $mantenimiento->duracion = $duracion;
            $mantenimiento->costo = $request->input('costo');
            $revision->conclusion = $request->input('conclusion');
            $revision->estado_id = 3;
            $mantenimiento->save();
            $revision->save();
            //return dd($mantenimiento,$duracion,$revision);
            return redirect()->route('revisiones_tecnicas.index');
            }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->delete();
        return redirect()->route('mantenimientos.index');
    }
}
