<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use function Livewire\str;

class RolController extends Controller
{
    public function __construct(){
        $this->middleware('can:administrar_roles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);
        //return dd($roles);
        return view('roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        return view('roles.create',['permisos'=>$permisos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $rol = Role::create($request->all());
        $rol->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success','El rol fue creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Role::findOrFail($id);
        $permissions = $rol->getAllPermissions();
        return view('roles.show',['permisos'=>$permissions,'rol'=>$rol]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rol)
    {
        $permissions = Permission::all();
        $rol = Role::findOrFail($rol);
        $ownedroles = $rol->getAllPermissions();
        //$ownedroles = array_intersect_key([$permissions],[$rol->permissions]);


        return view('roles.edit',['permissions'=>$permissions,'rol' =>$rol,'ownedroles'=>$ownedroles]);
 //       return dd($rol->permissions,$permissions, $ownedroles);
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
        $request->validate([
            'name'=>'required'
        ]);
        $rol = Role::findOrFail($id);
        $rol->update($request->all());
        $rol->permissions()->sync($request->permissions);
        //return dd($request->all(), $rol);
        return redirect()->route('roles.index')->with('success','El rol fse actualizo exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $rol)
    {
        //
    }
}
