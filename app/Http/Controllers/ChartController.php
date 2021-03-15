<?php

namespace App\Http\Controllers;

use App\Models\User;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::select(DB::raw("COUNT(*)as count"))
        ->whereYear("created_at",date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $months= User:: select(DB::raw("Month(created_at) as month"))
        ->whereYear("created_at",date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas= array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month-1]=$users[$index];
        }
        return view ('chart',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function barChart()
    { /*
        $users= User::select(DB::raw("COUNT(*)as count"))
        ->whereYear("created_at",date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $months= User:: select(DB::raw("Month(created_at) as month"))
        ->whereYear("created_at",date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas= array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month-1]=$users[$index];
        }
        return view ('bar-chart',compact('datas'));
*/
/*

 }
   
   
*/
$valores1= DB::table('egresos')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, count(*) as egresoss')
 ->join('revisiones_tecnicas','egresos.revision_id','=','revisiones_tecnicas.id_revision')
 ->join('activos_fijos','revisiones_tecnicas.AF_id','=','activos_fijos.id_AF')
 ->join('categorias','activos_fijos.categoria_id','=','categorias.id_categoria')
 ->pluck('egresoss');

 $categorias1= DB::table('egresos')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, count(*) as egresos')
 ->join('revisiones_tecnicas','egresos.revision_id','=','revisiones_tecnicas.id_revision')
 ->join('activos_fijos','revisiones_tecnicas.AF_id','=','activos_fijos.id_AF')
 ->join('categorias','activos_fijos.categoria_id','=','categorias.id_categoria')
 ->pluck('categorias.nombre');
 $colores1= array();
 for ( $i = 0; $i < sizeof($categorias1); $i++ ) {
   $colores[$i]='rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.73)';}

$valores2= DB::table('detalles_de_compras')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, sum(detalles_de_compras.total) as valor')
 ->join('categorias','detalles_de_compras.categoria_id','=','categorias.id_categoria')
 ->pluck('valor');

 

 $categorias2= DB::table('detalles_de_compras')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, sum(detalles_de_compras.total) as valor')
 ->join('categorias','detalles_de_compras.categoria_id','=','categorias.id_categoria')

  ->pluck('categorias.nombre');
    
  $colores2= array();
  for ( $i = 0; $i < sizeof($categorias2); $i++ ) {
    $colores[$i]='rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.73)';}
// el valor de todos los mantenimientos, por categoria
$categorias3= DB::table('mantenimientos')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, sum(mantenimientos.costo) as valor')
 ->join('revisiones_tecnicas','mantenimientos.revision_id','=','revisiones_tecnicas.id_revision')
 ->join('activos_fijos','revisiones_tecnicas.AF_id','=','activos_fijos.id_AF')
 ->join('categorias','activos_fijos.categoria_id','=','categorias.id_categoria')
 ->pluck ('categorias.nombre');

 $valores3= DB::table('mantenimientos')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, sum(mantenimientos.costo) as valor')
 ->join('revisiones_tecnicas','mantenimientos.revision_id','=','revisiones_tecnicas.id_revision')
 ->join('activos_fijos','revisiones_tecnicas.AF_id','=','activos_fijos.id_AF')
 ->join('categorias','activos_fijos.categoria_id','=','categorias.id_categoria')
 ->pluck ('valor');

 $colores3= array();
  for ( $i = 0; $i < sizeof($categorias3); $i++ ) {
    $colores[$i]='rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.73)';}



     return view ('bar-chart',compact('categorias1','valores1','colores1','categorias2','valores2','colores2','categorias3','valores3','colores3'));
    
    }
  
    public function store(Request $request)
    {
        //
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
        //
    }
}
