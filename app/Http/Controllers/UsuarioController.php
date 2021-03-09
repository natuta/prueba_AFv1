<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Estado;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UsuarioController extends Controller
{
    use PasswordValidationRules;
    use  HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(5);
        return view('usuarios.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.registrar');
    }

    public function habilitar($id){
        $us = User::findOrFail($id);
        $us->estado_id = 1;
        $us->save();
        return redirect()->route('usuarios.index');
    }

    public function deshabilitar($id){
        $us = User::findOrFail($id);
        $us->estado_id = null;
        $us->estado_id = 2;
        $us->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->input('name');
        $user->apellido = $request->input('apellido');
        $user->sexo = $request->input('sexo');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        //return dd($user);

        return redirect()->route('usuarios.index')->with('succes','El usuario ha sido registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->roles;
        $cantidad_roles = count($roles);
        return view('usuarios.show',['user'=>$user,'roles'=>$roles,'cantidad_roles'=>$cantidad_roles]);
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


    //Asignar un rola un usuario recien creado
    public function AsignarRol($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.asignarol',['user'=>$user,'roles'=>$roles]);
    }

    //Asignar un estado cuando un usuario es creado
    public function AsignarEstado($id)
    {
        $user = User::findOrFail($id);
        $estados = Estado::all();
        return view('usuarios.asignar_estado',['user'=>$user,'estados'=>$estados]);
    }

    public function AsignarContacto($id)
    {
        $user = User::findOrFail($id);
        return view('contactos.create',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        if($request->has('roles')){
            $usuario->syncRoles($request->roles);
        }

        if($request->has('estado_id')){
            $usuario->estado_id = $request->input('estado_id');
            $usuario->save();
        }

        if($request->has('direccion')){
            $usuario->conatcto_id = $request->input('contacto_id');
            $usuario->save();
        }

        return redirect()->route('usuarios.show',[$usuario->id]);
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
