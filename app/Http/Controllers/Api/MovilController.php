<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activo_Fijo;
use App\Models\Almacen;
use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\Egreso;
use App\Models\Estado;
use App\Models\Mantenimiento;
use App\Models\Revision_Tecnica;
use App\Models\Rubro;
use App\Models\Solicitud;
use App\Models\Solicitud_Movimiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class MovilController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user_auth          = Auth::user();
            return response()->json(['success' => true, 'message' => 'Login correcto', 'data' => $user_auth]);
        } else {
            return response()->json(['success' => false, 'message' => 'Correo o contraseña incorrectas', 'data' => null]);
        }
    }

    public function listarUsuarios()
    {	
    	$lista = User::get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);

    }
    public function registrarUsuarios(Request $request)
    {   
        $usuario = new User;
        $usuario->name = $request->input('nombres');
        $usuario->email = $request->input('email');
        $usuario->apellido = $request->input('apellidos');
        $usuario->sexo = $request->input('sexo');
        $usuario->password = Hash::make($request->input('password'));
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(storage_path() . '/app/public/profile-photos/', $file->getClientOriginalName());
            $file            = $request->file('file');
            $imagen          = $file->getClientOriginalName();
            $usuario->profile_photo_path = $imagen;
        }
        $usuario->save();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $usuario]);

    }
     public function prueba(Request $request)
    {   
                $bitacoras = Bitacora::with('user')->whereHas('user',function($q)use ($request){
            $q->where('apellido','like',$request->input('apellido').'%');
        })->get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $bitacoras]);

    }
    public function registrarRubros(Request $request)
    {   
        $rubro = new Rubro;
        $rubro->nombre = $request->input('nombre');
        $rubro->descripcion = $request->input('descripcion');
        $rubro->vida_util = $request->input('vidautil');
        $rubro->coeficiente_depr = $request->input('coeficiente');

        $rubro->save();

        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $rubro]);
    }
    public function registrarCategorias(Request $request)
    {   

        $categoria = new Categoria;
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('categoria');
        $categoria->depreciar = $request->input('depreciar');
        $categoria->actualiza = $request->input('actualiza');
        $categoria->rubro_id = $request->input('idrubro');
        $categoria->save();
        $rubro = Rubro::findOrFail($request->input('idrubro'));
        $categoria->rubro=$rubro;
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categoria]);

    }
    public function listarRubros()
    {   
        $lista = Rubro::get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);

    }
    public function listarCategorias()
    {   
        $lista = Categoria::with('rubro')->get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);
    }
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function eliminarRubros(Request $request)
    {
        $cat = Rubro::findOrFail($request->input('id'));
        $cat->delete();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => null]);
    }
    public function eliminarCategorias(Request $request)
    {
        $cat = Categoria::findOrFail($request->input('id'));
        $cat->delete();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => null]);
    }
        public function eliminarUsuarios(Request $request)
    {
        $cat = User::findOrFail($request->input('id'));
        $cat->delete();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => null]);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function devolverRubros(Request $request)
    {
        $cat = Rubro::findOrFail($request->input('id'));
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $cat]);
    }
    public function devolverCategorias(Request $request)
    {
        $categoria = Categoria::findOrFail($request->input('id'));
        $rubro = Rubro::findOrFail($categoria->rubro_id);
        $categoria->rubro=$rubro;
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categoria]);
    }
    public function devolverUsuarios(Request $request)
    {
        $categoria = User::findOrFail($request->input('id'));
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categoria]);
    }

    public function editarRubros(Request $request)
    {
        $rubro = Rubro::findOrFail($request->input('id'));
        $rubro->nombre = $request->input('nombre');
        $rubro->descripcion = $request->input('descripcion');
        $rubro->vida_util = $request->input('vidautil');
        $rubro->coeficiente_depr = $request->input('coeficiente');
        $rubro->save();

        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $rubro]);
    }
    public function editarCategorias(Request $request)
    {
        $categoria = Categoria::findOrFail($request->input('id'));
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('categoria');
        $categoria->depreciar = $request->input('depreciar');
        $categoria->actualiza = $request->input('actualiza');
        $categoria->rubro_id = $request->input('idrubro');
        $categoria->save();
        $rubro = Rubro::findOrFail($request->input('idrubro'));
        $categoria->rubro=$rubro;
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categoria]);
    }
    public function editarUsuarios(Request $request)
    {   
        $usuario = User::findOrFail($request->input('id'));
        $usuario->name = $request->input('nombres');
        $usuario->email = $request->input('email');
        $usuario->apellido = $request->input('apellidos');
        $usuario->sexo = $request->input('sexo');
        if (!empty($request->input('password'))) {
        $usuario->password = bcrypt($request->get('password'));
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(storage_path() . '/app/public/profile-photos/', $file->getClientOriginalName());
            $file            = $request->file('file');
            $imagen          = $file->getClientOriginalName();
            $usuario->profile_photo_path = $imagen;
        }
        $usuario->save();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $usuario]);

    }

    public function listarRevisiones(Request $request)
    {   
        $lista = Revision_Tecnica::with('activo')->whereHas('activo',function($q)use ($request){
            $q->where('id_revision','like','%'.$request->input('nombre').'%');
        })->get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);
    }
    public function listarEgresos(Request $request)
    {   
        $lista = Egreso::with('revision.activo')->whereHas('revision.activo',function($q)use ($request){
            $q->where('nombre','like','%'.$request->input('nombre').'%');
        })->get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);
    }
    public function listarMantenimientos(Request $request)
    {   
        $lista = Mantenimiento::with('revision.activo')->whereHas('revision.activo',function($q)use ($request){
            $q->where('nombre','like','%'.$request->input('nombre').'%');
        })->get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);
    }
    public function listarActivosFijos(Request $request)
    {   
        $lista = Activo_Fijo::with('categoria')->where('nombre','like','%'.$request->input('nombre').'%')->get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);
    }
    /**
     * undocumented function
     *
     * @return void
     * @author dayler
     **/
    public function registrarRevisiones(Request $request)
    {
        $revision = new Revision_Tecnica();
        $revision->fecha = Carbon::now('America/Caracas');
        $revision->user_id = $request->input('idusuario');;
        $revision->estado_id =  $request->input('estado_id');
        $revision->AF_id =  $request->input('activo_id');
        $revision->conclusion =  0;
        $revision->save();

        $mantenimiento = new Mantenimiento();
        $mantenimiento->revision_id = $revision->id_revision;
        $mantenimiento->problema = $request->input('problema');
        $mantenimiento->fecha_inicio =$request->input('fecha_inicio');
        $mantenimiento->save();

        $datoNuevo = Revision_Tecnica::with('activo')->findOrFail($revision->id_revision);
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $datoNuevo]);
    }
    public function listarEstados()
    {   
        $lista = Estado::get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $lista]);
    }
    public function registrarMantenimientos(Request $request)
    {
        $revision = Revision_Tecnica::findOrFail($request->input('idrevision'));

        $idmantenimiento= Revision_Tecnica::with('mantenimiento')->findOrFail($request->input('idrevision'))->mantenimiento->id_mantenimiento;

        $mantenimiento = Mantenimiento::findOrFail($idmantenimiento);
        $duracion = $mantenimiento->fecha_inicio->diffInDays($request->input('fecha_fin'));

        if( $request->fecha_fin < $mantenimiento->fecha_inicio ){
            //return dd($mantenimiento,$duracion);
        return response()->json(['success' => false, 'message' => 'Error en la fecha final', 'data' => null]);
            
        }else{
            $mantenimiento->problema = $request->input('problema');
            $mantenimiento->solucion = $request->input('solucion');
            $mantenimiento->fecha_fin = $request->input('fecha_fin');
            $mantenimiento->duracion = $duracion;
            $mantenimiento->costo = $request->input('costo');
            if($request->input('conlusion')==0){
                $revision->conclusion = 1;
            }else if($request->input('conlusion')==1){
                $revision->conclusion = 2;
            }
            $revision->estado_id = 3;
            $mantenimiento->save();
            $revision->save();
            $datoNuevo = Revision_Tecnica::with('activo')->findOrFail($revision->id_revision);
            //return dd($mantenimiento,$duracion,$revision);
            return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $datoNuevo]);

            }
    }
    public function devolverMantenimientos(Request $request)
    {
        $datoNuevo = Revision_Tecnica::with('mantenimiento')->findOrFail($request->input('idrevision'));
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $datoNuevo]);
    }
    public function registrarEgresos(Request $request)
    {   
        $egreso = new Egreso;
        $egreso->fecha = $request->input('fecha');
        $egreso->descripcion =  $request->input('descripcion');
        $egreso->revision_id =  $request->input('revision_id');
        $egreso->save();
        $revision = Revision_Tecnica::findOrFail($request->input('revision_id'));
        $revision->conclusion = 3;
        $revision->save();

        $datoNuevo = Revision_Tecnica::with('activo')->findOrFail($request->input('revision_id'));
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $datoNuevo]);
    }
    public function registrarActivos(Request $request)
    {   
        $activo = new Activo_Fijo();
        $activo->nombre = $request->input('nombre');
        $activo->fecha_obtencion = $request->input('fecha');
        $activo->valor_compra = $request->input('valor_compra');
        $activo->estado_id = $request->input('estado_id');
        $activo->categoria_id = $request->input('categoria_id');
        $activo->departamento_id = $request->input('dpto_id');
        $activo->almacen_id = $request->input('almacen_id');
        $activo->save();
        $datoNuevo = Activo_Fijo::with('categoria')->findOrFail($activo->id_AF);

        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $datoNuevo]);
    }
    public function selectCategorias()
    {   
        $categorias = Categoria::get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categorias]);
    }
    public function selectEstados()
    {   
        $categorias = Estado::get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categorias]);
    }
    public function selectDepartamentos()
    {   
        $categorias = Departamento::get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categorias]);
    }
    public function selectAlmacenes()
    {   
        $categorias = Almacen::get();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => $categorias]);
    }
    public function eliminarRevision(Request $request)
    {
        $cat = Revision_Tecnica::findOrFail($request->input('id'));
        $cat->delete();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => null]);
    }
    public function eliminarActivo(Request $request)
    {
        $cat = Activo_Fijo::findOrFail($request->input('id'));
        $cat->delete();
        return response()->json(['success' => true, 'message' => 'Consulta generada exitosamente', 'data' => null]);
    }

}
