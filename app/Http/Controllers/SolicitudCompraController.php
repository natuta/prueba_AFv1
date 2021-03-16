<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Detalle_Compra;
use App\Models\Proveedor;
use App\Models\Solicitud;
use App\Models\Solicitud_Compra;
use App\Traits\HasBitacora;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class SolicitudCompraController extends Controller
{
    use HasBitacora;

    public static $TipoSolicitud = 2;
    public function __construct()
    {
        $this->middleware('can:compras.index')->only('index');
        $this->middleware('can:compras.create')->only('create');
        $this->middleware('can:compras.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Solicitud_Compra::paginate(10);
        return view('solicitudes_compras.index',['compras'=>$compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();
        return view('solicitudes_compras.create',['proveedores'=>$proveedores,'categorias'=>$categorias]);
    }



    public function llenarformulario(Request $request){

        $categoria = Categoria::findOrFail($request->categoria_id);
        $proveedor = Proveedor::findOrFail($request->proveedor_id);
        $fecha = Carbon::now('America/Caracas');
        return view('solicitudes_compras.llenarformulario',['fecha'=>$fecha,'proveedor'=>$proveedor,'categoria'=>$categoria]);
        //return dd($proveedor,$categoria,$fecha);


    }

    public function montoTotal($costo,$cantidad){
        $total = $costo * $cantidad;
        return $total;
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
        $solicitud->user_id = auth()->user()->id;
        $solicitud->fecha = Carbon::now('America/Caracas');
        $solicitud->tipo = self::$TipoSolicitud;
        $solicitud->save();

        $sol_compra = new Solicitud_Compra();
        $sol_compra->solicitud_id = $solicitud->id_solicitud;
        $sol_compra->proveedor_id = $request->input('proveedor_id');
        $sol_compra->nombre = $request->input('nombre');
        $sol_compra->save();

        $detalle_compra = new Detalle_Compra();
        $detalle_compra->sol_compra_id =  $sol_compra->id_sol_compra;
        $detalle_compra->categoria_id =  $request->input('categoria_id');
        $detalle_compra->detalle = $request->input('detalle');
        $detalle_compra->cantidad = $request->input('cantidad');
        $detalle_compra->costo = $request->input('costo');
        $detalle_compra->total = self::montoTotal($request->input('costo'),$request->input('cantidad'));
        $detalle_compra->save();

        $modelo = class_basename($sol_compra);
        HasBitacora::Created($modelo,$sol_compra->id_sol_compra);
        //return dd($solicitud,$sol_compra,$detalle_compra);
        return redirect()->route('compras.index')->with('success','Solicitud de compra registrada correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $cmp = Solicitud_Compra::findOrFail($id);
        $modelo = class_basename($cmp);
        HasBitacora::Deleted($modelo,$cmp->id_sol_compra);
        $cmp->delete();
        return redirect()->route('compras.index');
    }
}
