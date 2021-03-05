<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Proveedor;
use App\Models\Rubro;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor= Proveedor::paginate(5);
        return view('proveedores.index',['proveedor'=>$proveedor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();
        return view('proveedores.create',['estados'=>$estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contacto();
        $prov = new Proveedor();
        $contact->celular = $request->input('celular');
        $contact->telefono = $request->input('telefono');
        $contact->direccion = $request->input('direccion');
        $contact->email_personal = $request->input('email_personal');
        $contact->save();

        $prov->nombre = $request->input('nombre');
        $prov->estado_id = $request->input('estado_id');
        $prov->contacto_id = $contact->id_contacto;
        $prov->save();
        //return dd($request);
        return redirect()->route('proveedores.index')->with('success','Proveedor registrado correctamente');
        //TODO: El estado_id siempre envia siempre 'No activo'
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$proveedor = Proveedor::with('estado')->with('contacto')->get()->where('id_proveedor','=',$id);
        $proveedor = Proveedor::findOrFail($id);
        $estados = Estado::all();
        return view('proveedores.show',['proveedor'=>$proveedor,'estados'=>$estados]);
        //return dd($prov->estado->nombre);
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
        $prov = Proveedor::findOrFail($id);
        $prov->nombre = $request->input('nombre');
        $prov->estado_id = $request->input('estado_id');
        $prov->save();

        $contac = $prov->contacto;
        $contac->direccion = $request->input('direccion');
        $contac->celular = $request->input('celular');
        $contac->telefono = $request->input('telefono');
        $contac->email_personal = $request->input('email_personal');
        $contac->save();
        //return dd($prov,$contac);
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prov = Proveedor::findOrFail($id);
        $contac = Contacto::findOrFail($prov->contacto_id);
        //$contac = Contacto::findOrFail($prov->contacto_id);

        $contac->delete();
        //$prov->delete();
        return redirect()->route('proveedores.index');
        //return dd($prov,$contac);
    }

    public function prueba($id){
        $prov = Proveedor::findOrFail($id);
        //$prov->delete();
        $contac = Contacto::findOrFail($prov->contacto);
        //return redirect()->route('proveedores.index');
        return dd($prov,$contac);
    }
}
