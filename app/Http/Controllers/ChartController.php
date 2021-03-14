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
 $valores= DB::table('detalles_de_compras')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, sum(detalles_de_compras.total) as valor')
 ->join('categorias','detalles_de_compras.categoria_id','=','categorias.id_categoria')
 ->pluck('valor');



 $categorias= DB::table('detalles_de_compras')
 ->groupBy('categorias.nombre')
 ->selectRaw('categorias.nombre, sum(detalles_de_compras.total) as valor')
 ->join('categorias','detalles_de_compras.categoria_id','=','categorias.id_categoria')
  ->pluck('categorias.nombre');
    
   
    foreach($categorias as $index => $categoria)
    {
        $datas[$categoria]=$valores[$index];
    }
     return view ('bar-chart',compact('datas'));
    
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
