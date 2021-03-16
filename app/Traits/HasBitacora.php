<?php

namespace App\Traits;

use App\Models\Bitacora;
use Carbon\Carbon;



trait HasBitacora{

        public static function Created($modelo, $id){
            $bitacora = new Bitacora();
            $bitacora->user_id = auth()->user()->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 3;
            $descripcion = ("El usuario " . auth()->user()->name . " ha creado un nuevo ". $modelo . " con codigo: " . $id);
            $bitacora->Descripcion = $descripcion;
            $bitacora->save();
            return $bitacora;
        }

        public static function Edited($modelo, $id){
            $bitacora = new Bitacora();
            $bitacora->user_id = auth()->user()->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 4;
            $descripcion = ("El usuario " . auth()->user()->name . " ha editado un ". $modelo . " con codigo: " . $id);
            $bitacora->Descripcion = $descripcion;
            $bitacora->save();
            return $bitacora;
        }

        public static function Deleted($modelo, $id){
            $bitacora = new Bitacora();
            $bitacora->user_id = auth()->user()->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 5;
            $descripcion = ("El usuario " . auth()->user()->name . " ha eliminado un ". $modelo . " con codigo: " . $id);
            $bitacora->Descripcion = $descripcion;
            $bitacora->save();
            return $bitacora;
        }

        public static function Login($user){
            $bitacora = new Bitacora();
            $bitacora->user_id = $user->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 1;
            $bitacora->Descripcion =  $user->name . ' ' .$user->apellido . ' ha inciado sesion.';
            $bitacora->save();
            return $bitacora;
        }

        public static function Logout($user){
            $bitacora = new Bitacora();
            $bitacora->user_id = $user->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 2;
            $descripcion = ($user->name . ' ' . $user->apellido. ' ha cerrado sesion');
            $bitacora->Descripcion = $descripcion;
            $bitacora->save();
            return $bitacora;
        }
    }

?>
