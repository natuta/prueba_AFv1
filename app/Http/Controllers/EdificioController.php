<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edificios = Edificio::paginate(5);
        return view('edificios.index',['edificios'=>$edificios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities =  Ciudad::all();
        return view('edificios.create',['cities'=>$cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edif =  new Edificio();
        $edif->nombre = $request->input('nombre');
        $edif->direccion = $request->input('direccion');
        $edif->ciudad_id = $request->input('ciudad_id');
        $edif->save();
        return redirect()->route('edificios.index')->with('success','Categoria registrada correctamente');
        //return dd($edif);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edif = Edificio::findOrFail($id);
        $cities = Ciudad::all();
        return view('edificios.show',['edif'=>$edif,'cities'=>$cities]);
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
        $edif = Edificio::findOrFail($id);
        $edif->nombre = $request->input('nombre');
        $edif->direccion = $request->input('direccion');
        $edif->ciudad_id = $request->input('ciudad_id');
        $edif->save();
        return redirect()->route('edificios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edif = Edificio::findOrFail($id);
        $edif->delete();
        return redirect()->route('edificios.index');
    }
}
