<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function __construct(){
        $this->middleware(['can:ciudades.index'])->only('index');
        $this->middleware(['can:ciudades.create'])->only('create');
        $this->middleware(['can:ciudades.edit'])->only('edit');
        $this->middleware(['can:ciudades.destroy'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Ciudad::paginate(5);
        return view('ciudades.index',['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciudades.create')->with('success','Ciudad registrada correctamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city =  new Ciudad();
        $city->nombre = $request->input('nombre');
        $city->save();
        return redirect()->route('ciudades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = Ciudad::findOrFail($id);
        return view('ciudades.show',['city'=>$city]);
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
        $city = Ciudad::findOrFail($id);
        $city->nombre = $request->input('nombre');
        $city->save();
        return redirect()->route('ciudades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Ciudad::findOrFail($id);
        $city->delete();
        return redirect()->route('ciudades.index');
    }
}
