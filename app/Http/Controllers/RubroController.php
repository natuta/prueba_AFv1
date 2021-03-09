<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    public function __construct(){
        $this->middleware('can:rubros.index')->only('index');
        $this->middleware('can:rubros.create')->only('create');
        $this->middleware('can:rubros.show')->only('show');
        $this->middleware('can:rubros.edit')->only('edit');
        $this->middleware('can:rubros.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$rubro = Rubro::orderBy('id_rubro','ASC')->paginate(10);
        $rubro = Rubro::paginate(5);
        return view('Rubro.index',['rubro'=>$rubro]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Rubro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rubro = new Rubro();
        $rubro->nombre = $request->input('nombre');
        $rubro->descripcion = $request->input('descripcion');
        $rubro->vida_util = $request->input('vida_util');
        $rubro->coeficiente_depr = $request->input('coeficiente_depr');
        $rubro->save();
        return redirect()->route('rubros.index')->with('success','Rubro registrado correctamente');
        //return dd($request->input('nombre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rubro = Rubro::findOrFail($id);
        return view('Rubro.show',['rubro'=>$rubro]);

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
        $rubro = Rubro::findOrFail($id);
        $rubro->nombre = $request->input('nombre');
        $rubro->descripcion = $request->input('descripcion');
        $rubro->vida_util = $request->input('vida_util');
        $rubro->coeficiente_depr = $request->input('coeficiente_depr');
        $rubro->save();
        return redirect()->route('rubros.index')->with('Exito', 'Rubro actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubro = Rubro::findOrFail($id);
        $rubro->delete();
        return redirect()->route('rubros.index');
    }
}
