<?php

namespace App\Http\Controllers;


use App\Models\Revaluo;
use App\Models\Activo_Fijo;
use App\Models\Estado;
use App\Models\Revision_Tecnica;

use Carbon\Carbon;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;


class RevaluoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revaluo = Revaluo::paginate(5);
        //return dd($revision);
        return view('revaluos.index',['revaluos'=>$revaluo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activos = Activo_Fijo::all();
        $revisiones = Revision_Tecnica::all();
        return view('revaluos.create',['afs'=>$activos,'revisiones'=>$revisiones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rev = new Revaluo();
        $rev->fecha = Carbon::now('America/Caracas');
       // $rev->user_id = auth()->user()->id;
       // $rev->estado_id =  $request->input('estado_id');
        $rev->AF_id =$request->input('activo_id');
        $rev->descripcion=$request->input('descripcion');
        $rev->monto =$request->input('valor');
        $rev->estado_id=1;
        $rev->revision_id=$request->input('revision_id');
        $rev->save();


       //return dd($revision,$mantenimiento);
        return redirect()->route('revaluos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rev = Revaluo::findOrFail($id);
        return view('revaluos.show',['revaluo'=>$rev]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
