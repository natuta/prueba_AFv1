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
    public function __construct(){
        $this->middleware('can:revaluos.index')->only('index');
        $this->middleware('can:revaluos.show')->only('show');
        $this->middleware('can:revaluos.create')->only('create');
        $this->middleware('can:revaluos.edit')->only('edit');
        $this->middleware('can:revaluos.destroy')->only('destroy');
    }
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
    public function crear($activo_id, $revision_id, $monto)
    {
        $activo = Activo_Fijo::findOrFail($activo_id);
        $revision = Revision_Tecnica::findOrFail($revision_id);
        $nuevoMonto = $this->nuevoValor($monto);
        return view('revaluos.create',['activo'=>$activo,'revision'=>$revision,'nuevo_monto'=>$nuevoMonto,'monto'=>$monto]);
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
        $rev->AF_id = $request->input('activo_id');
        $rev->revision_id = $request->input('revision_id');
        $rev->estado_id = 1;
        $rev->fecha = Carbon::now('America/Caracas');
        $nuevoValor = $this->nuevoValor($request->input('monto'));
        $rev->monto = $nuevoValor;
        $rev->descripcion = $request->input('descripcion');
        $rev->save();


       //return dd($rev);
        return redirect()->route('revaluos.index')->with('success','el activo fijo ha sido revalorizado');
    }

    public function nuevoValor($costo){
        return ($costo*10);
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
