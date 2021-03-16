<?php

namespace App\Http\Controllers;

use App\Models\Activo_Fijo;
use App\Models\Codificacion;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;

class codificacionController extends Controller
{

    public function __construct(){
        $this->middleware(['can:codificaciones.index'])->only('index');
        $this->middleware(['can:codificaciones.create'])->only('create');
        $this->middleware(['can:codificaciones.edit'])->only('edit');
        $this->middleware(['can:codificaciones.destroy'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codificaciones = Codificacion::paginate(5);
        return view('codificaciones.index',['codificaciones'=>$codificaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activos = Activo_Fijo::all();
        return view('codificaciones.create',['activo'=>$activos] )->with('success','Codigo generado correctamente');
    }
public function crearcodigoqr($request,$activo)
{
    $qrimage= public_path(' public/storage/qr.png');
    QRCode::url('www.pharalax.com')->setOutfile($qrimage)->png();
    QRCode::text($activo)->setOutfile($qrimage)->png();
return($qrimage);
}
    public function llenar(Request $request){
        $activo = Activo_Fijo::findOrFail($request->AF_id);
        $qr=$this->crearcodigoqr($activo);
        $activo->AF_id = $request->input('AF_id');
        $activo->codigo=$request->input('codigo');
        $activo->estado=$request->input('estado');
        return view('depreciacion.llenar',['activo'=>$activo,'qr_code'=>$qr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codi =  new Codificacion();
        $codi->AF_id = $request->input('AF_id');
        $codi->codigo=$request->input('codigo');
        $codi->estado=$request->input('estado');
        $codi->save();
        return redirect()->route('codificaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codi = Ciudad::findOrFail($id);
        return view('codificaciones.show',['codi'=>$codi]);
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
        $codi =  new Codificacion();
        $codi->AF_id = $request->input('AF_id');
        $codi->codigo=$request->input('codigo');
        $codi->estado=$request->input('estado');
        $codi->save();
        return redirect()->route('codificaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codi = Codificacion::findOrFail($id);
        $codi->delete();
        return redirect()->route('codificaciones.index');
    }
}
