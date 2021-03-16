<?php

namespace App\Http\Controllers;

use App\Models\Activo_Fijo;
use App\Models\Codificacion;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CodificacionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('can:codificacion.index')->only('index');
        $this->middleware('can:codificacion.create')->only('create');
        $this->middleware('can:codificacion.edit')->only('edit');
        $this->middleware('can:codificacion.destroy')->only('destroy');
        $this->middleware('can:codificacion.show')->only('show');
    }
    public function index()
    {
        $codificaciones = Codificacion::paginate(5);

        return view('codificacion.index',['codificacion'=>$codificaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activo =  Activo_Fijo::all();
        return view('codificacion.create',['activo'=>$activo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generatecode($input, $strength = 16){
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;

    }
    public function llenar(Request $request){

        $activo = Activo_Fijo::findOrFail($request->activo_id);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo = self::generatecode($permitted_chars);

        return view('codificacion.llenar',['activo'=>$activo,'codigo'=>$codigo]);
    }

    public function store(Request $request)
    {
        $codi =  new Codificacion();
        $codi->AF_id= $request->input('AF_id');
        $codi->codigo= $request->input('codigo');

        $codi->save();
        return redirect()->route('codificacion.index')->with('success','codificacion registrado correctamente');
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
        $cod = Codificacion::findOrFail($id);
        $act = Activo_Fijo::all();
        return view('codificacion.show',['cod'=>$cod,'act'=>$act]);
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
        $codi = Codificacion::findOrFail($id);
        $codi->AF_id= $request->input('AF_id');
        $codi->estado_id=$request->input('estado_id');
        $codi->save();
        return redirect()->route('codificacion.index')->with('success','Codigo actualizado correctamente');

        //return dd($edif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cod = Codificacion::findOrFail($id);
        $cod->delete();
        return redirect()->route('codificacion.index');
    }
}
