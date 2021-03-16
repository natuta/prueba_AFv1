<?php

namespace App\Http\Controllers;

use App\Models\Activo_Fijo;
use App\Models\Departamento;
use App\Models\Detalle_Movimiento;
use App\Models\Solicitud;
use App\Models\Solicitud_Movimiento;
use App\Traits\HasBitacora;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SolicitudMovimientoController extends Controller
{

    use HasBitacora;
    public static $TipoSolicitud = 1;

    public function __construct()
    {
        $this->middleware('can:movimientos.index')->only('index');
        $this->middleware('can:movimientos.create')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Solicitud_Movimiento::paginate(10);
        return view('solicitudes_movimientos.index',['movimientos'=>$movimientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $af = Activo_Fijo::all();
        $dpto = Departamento::all();
        return view('solicitudes_movimientos.create',['afs'=>$af,'dpto'=>$dpto]);
    }


    public function llenarformulario(Request $request){

        $mensaje = "Este metodo si funciona bien";
        $dpto = Departamento::findOrFail($request->activo_id);
        //$dpto = $request->destino_dpto;
        //$activo = $request->activo_id;
        $fecha = Carbon::now('America/Caracas');
        $activo = Activo_Fijo::findOrFail($request->activo_id);
        return view('solicitudes_movimientos.llenarformulario',['mensaje'=>$mensaje,'dpto'=>$dpto,'activo'=>$activo,'fecha'=>$fecha]);
        //return dd($activo,$dpto,$mensaje);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitud = new Solicitud();
        $solicitud->fecha = Carbon::now('America/Caracas');
        $solicitud->user_id = auth()->user()->id;
        $solicitud->tipo = self::$TipoSolicitud;
        $solicitud->save();

        $sol_mov = new Solicitud_Movimiento();
        $sol_mov->solicitud_id =  $solicitud->id_solicitud;
        $sol_mov->save();

        $det_mov = new Detalle_Movimiento();
        $det_mov->solicitud_mov_id = $sol_mov->id_sol_mov;
        $det_mov->destino_dpto = $request->input('destino_dpto');
        $det_mov->origen_dpto = $request->input('origen_dpto');
        $det_mov->af_id = $request->input('af_id');
        $det_mov->cantidad = $request->input('cantidad');
        $det_mov->save();

        $model = class_basename($sol_mov);
        HasBitacora::Created($model,$sol_mov->id_sol_mov);

        return redirect()->route('movimientos.index')->with('success','Solicitud de movimiento registrada correctamente');
        //return dd($solicitud,$sol_mov,$det_mov);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $af = Activo_Fijo::all();
        $dpto = Departamento::all();
        return view('solicitudes_movimientos.show',['afs'=>$af,'dpto'=>$dpto]);
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
