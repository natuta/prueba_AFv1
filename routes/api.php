<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [\App\Http\Controllers\Api\MovilController::class,'login']);
Route::get('listarUsuarios', [\App\Http\Controllers\Api\MovilController::class,'listarUsuarios']);
Route::post('usuario/registrar', [\App\Http\Controllers\Api\MovilController::class,'registrarUsuarios']);
Route::post('categoria/registrar', [\App\Http\Controllers\Api\MovilController::class,'registrarCategorias']);
Route::post('rubro/registrar', [\App\Http\Controllers\Api\MovilController::class,'registrarRubros']);


Route::get('listarUsuarios', [\App\Http\Controllers\Api\MovilController::class,'listarUsuarios']);
Route::get('listarRubros', [\App\Http\Controllers\Api\MovilController::class,'listarRubros']);
Route::get('listarCategorias', [\App\Http\Controllers\Api\MovilController::class,'listarCategorias']);
Route::post('rubro/eliminar', [\App\Http\Controllers\Api\MovilController::class,'eliminarRubros']);
Route::post('categoria/eliminar', [\App\Http\Controllers\Api\MovilController::class,'eliminarCategorias']);
Route::post('prueba/registrar', [\App\Http\Controllers\Api\MovilController::class,'prueba']);


Route::post('rubro/devolver', [\App\Http\Controllers\Api\MovilController::class,'devolverRubros']);
Route::post('categoria/devolver', [\App\Http\Controllers\Api\MovilController::class,'devolverCategorias']);
Route::post('usuario/devolver', [\App\Http\Controllers\Api\MovilController::class,'devolverUsuarios']);

Route::post('rubro/editar', [\App\Http\Controllers\Api\MovilController::class,'editarRubros']);
Route::post('categoria/editar', [\App\Http\Controllers\Api\MovilController::class,'editarCategorias']);
Route::post('usuario/editar', [\App\Http\Controllers\Api\MovilController::class,'editarUsuarios']);


Route::post('usuario/eliminar', [\App\Http\Controllers\Api\MovilController::class,'eliminarUsuarios']);
//revisiones
Route::post('listarRevisiones', [\App\Http\Controllers\Api\MovilController::class,'listarRevisiones']);
Route::post('registrarRevisiones', [\App\Http\Controllers\Api\MovilController::class,'registrarRevisiones']);

//egresos
Route::post('listarEgresos', [\App\Http\Controllers\Api\MovilController::class,'listarEgresos']);
Route::post('registrarEgresos', [\App\Http\Controllers\Api\MovilController::class,'registrarEgresos']);

//mantenimientos
Route::post('listarMantenimientos', [\App\Http\Controllers\Api\MovilController::class,'listarMantenimientos']);
Route::post('registrarMantenimientos', [\App\Http\Controllers\Api\MovilController::class,'registrarMantenimientos']);

//activos fijos
Route::post('listarActivosFijos', [\App\Http\Controllers\Api\MovilController::class,'listarActivosFijos']);
Route::post('registrarActivos', [\App\Http\Controllers\Api\MovilController::class,'registrarActivos']);
Route::get('listarEstados', [\App\Http\Controllers\Api\MovilController::class,'listarEstados']);
Route::post('registrarMantenimientos', [\App\Http\Controllers\Api\MovilController::class,'registrarMantenimientos']);
Route::post('devolverMantenimientos', [\App\Http\Controllers\Api\MovilController::class,'devolverMantenimientos']);
Route::post('registrarEgresos', [\App\Http\Controllers\Api\MovilController::class,'registrarEgresos']);


Route::get('selectCategorias', [\App\Http\Controllers\Api\MovilController::class,'selectCategorias']);
Route::get('selectDepartamentos', [\App\Http\Controllers\Api\MovilController::class,'selectDepartamentos']);
Route::get('selectEstados', [\App\Http\Controllers\Api\MovilController::class,'selectEstados']);
Route::get('selectAlmacenes', [\App\Http\Controllers\Api\MovilController::class,'selectAlmacenes']);
Route::post('revision/eliminar', [\App\Http\Controllers\Api\MovilController::class,'eliminarRevision']);
Route::post('activo/eliminar', [\App\Http\Controllers\Api\MovilController::class,'eliminarActivo']);








