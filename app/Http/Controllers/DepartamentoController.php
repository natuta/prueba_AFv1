<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Edificio;
use App\Traits\HasBitacora;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    use HasBitacora;

    public function __construc(){
        $this->middleware('can:departamentos.index')->only('index');
        $this->middleware('can:departamentos.create')->only('create');
        $this->middleware('can:departamentos.edit')->only('edit');
        $this->middleware('can:departamentos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = Departamento::paginate(5);
        return view('departamentos.index',['departamento'=>$departamento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edificios = Edificio::all()->sortBy('ciudad_id');
        $ciudades =  Ciudad::all();
        return view('departamentos.create',[
            'edificios'=> $edificios,
            'ciudades'=>$ciudades,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dpto = new Departamento();
        $dpto->nombre = $request->input('nombre');
        $dpto->descripcion = $request->input('descripcion');
        $dpto->edificio_id = $request->input('edificio_id');
        $dpto->save();

        $modelo = class_basename($dpto);
        HasBitacora::Created($modelo,$dpto->id_departamento);

        return redirect()->route('departamentos.index')->with('success','Departamento registrado correctamente');
        //return dd($dpto);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dpto =  Departamento::findOrFail($id);
        $edificios = Edificio::all()->sortBy('ciudad_id');
        $ciudades =  Ciudad::all();
        return view('departamentos.show',[
            'edificios'=> $edificios,
            'ciudades'=>$ciudades,
            'dpto'=>$dpto,
        ]);
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
        $dpto = Departamento::findOrFail($id);
        $dpto->nombre = $request->input('nombre');
        $dpto->descripcion = $request->input('descripcion');
        $dpto->edificio_id = $request->input('edificio_id');
        $dpto->save();

        $modelo = class_basename($dpto);
        HasBitacora::Edited($modelo,$dpto->id_departamento);

        return redirect()->route('departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dpto = Departamento::findOrFail($id);
        $modelo = class_basename($dpto);
        HasBitacora::Deleted($modelo,$dpto->id_departamento);
        $dpto->delete();
        return redirect()->route('departamentos.index');
    }
}
