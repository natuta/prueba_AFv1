<?php

namespace App\Http\Controllers;
use App\Models\Rubro;
use App\Models\Activo_Fijo;
use App\Models\Depreciacion;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class DepreciacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('can:depreciacion.index')->only('index');
        $this->middleware('can:depreciacion.create')->only('create');
        $this->middleware('can:depreciacion.edit')->only('edit');
        $this->middleware('can:depreciacion.destroy')->only('destroy');
    }
    public function index()
    {
        $depreciaciones = Depreciacion::paginate(10);
        return view('depreciacion.index',['depreciaciones'=>$depreciaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $activos = Activo_Fijo::all();
        $rubros = Rubro::all(); // para que?


        return view('depreciacion.create',['activo'=>$activos,'rubro'=>$rubros]);

    }

    public function llenar(Request $request){
        $activo = Activo_Fijo::findOrFail($request->AF_id);
        $rubro = Rubro::findOrFail($request->rubro_id); //para que?

        $vidaUtil = $activo->categoria->rubro->vida_util;
        $coeDpr = $activo->categoria->rubro->coeficiente_depr;
        $valorCompra = $activo->valor_compra;
        $valor2 = self::depreciacion_acu($vidaUtil, $coeDpr, $valorCompra);

        return view('depreciacion.llenar',['activo'=>$activo,'rubro'=>$rubro,'valor2'=> $valor2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $depreciacion =  new Depreciacion();

        $depreciacion->descripcion = $request->input('descripcion');
        $depreciacion->fecha = $request->input('fecha');
        $depreciacion->AF_id = $request->input('af_id');

        $activo = Activo_Fijo::findOrFail($request->af_id);
        $vidaUtil = $activo->categoria->rubro->vida_util;
        $coeDpr = $activo->categoria->rubro->coeficiente_depr;

        $valorCompra = $activo->valor_compra;
        $valor2=$this->depreciacion_acu($vidaUtil,$coeDpr,$valorCompra);
        $depreciacion->depreciacion_acumulada = $valor2;

        $monto = self::new_monto($valorCompra,$valor2);
        $depreciacion->save();

        return redirect()->route('depreciacion.index')->with('success','depreciacion registrada correctamente');


    }
    public function new_monto($valor,$valor2){
        return ($valor-$valor2);
    }
    public function depreciacion_acu($añosdevida,$porcentaje,$valor){
        return ((($valor/$añosdevida)*$porcentaje)/100);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $depreciacion = Depreciacion::all();
        return view('depreciacion.show',['depreciacion'=>$depreciacion]);
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

        $depreciacion = Depreciacion::findOrFail($id);


        $depreciacion->depreciacion_acumulada = $request->input('depreciacion acumulada');
        $depreciacion->descripcion = $request->input( 'descripcion');
        $depreciacion->fecha = $request->input('fecha');
        $depreciacion->af_id = $request->get('AF_id');

        $depreciacion->rubro_id= $request->get('rubro_id');
        $depreciacion->save();
        return redirect()->route('depreciacion.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deprecia = Depreciacion::findOrFail($id);
        $deprecia->delete();
        return redirect()->route('depreciacion.index');
    }
}
