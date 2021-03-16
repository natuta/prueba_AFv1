<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Traits\HasBitacora;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\This;

class CiudadController extends Controller
{

    use HasBitacora;

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
        $cities = Ciudad::Paginate(10);
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
        $modelo = class_basename($city);
        HasBitacora::Created($modelo,$city->id_ciudad);
        return redirect()->route('ciudades.index')->with('success','La ciudad se ha registrado exitosamente');
        //return dd($bitacora, $modelo);
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

        $modelo = class_basename($city);
        HasBitacora::Edited($modelo,$city->id_ciudad);

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

        $modelo = class_basename($city);
        HasBitacora::Deleted($modelo,$city->id_ciudad);

        $city->delete();

        return redirect()->route('ciudades.index');
    }
}
