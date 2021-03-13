<?php

namespace App\Traits;

use App\Models\Accion;
use App\Models\Bitacora;
use Carbon\Carbon;


trait HasBitacora{

        public static function Created($modelo, $id){
            $bitacora = new Bitacora();
            $bitacora->user_id = auth()->user()->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 1;
            $descripcion = ("El usuario " . auth()->user()->name . " ha creado un nuevo ". $modelo . " con codigo: " . $id);
            $bitacora->Descripcion = $descripcion;
            $bitacora->save();
            return $bitacora;
        }

        public static function Edited($modelo, $id){
            $bitacora = new Bitacora();
            $bitacora->user_id = auth()->user()->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 1;
            $descripcion = ("El usuario " . auth()->user()->name . " ha editado un ". $modelo . " con codigo: " . $id);
            $bitacora->Descripcion = $descripcion;
            $bitacora->save();
            return $bitacora;
        }

        public static function Deleted($modelo, $id){
            $bitacora = new Bitacora();
            $bitacora->user_id = auth()->user()->id;
            $bitacora->Fecha = Carbon::now('America/Caracas');
            $bitacora->accion_id = 1;
            $descripcion = ("El usuario " . auth()->user()->name . " ha eliminado un ". $modelo . " con codigo: " . $id);
            $bitacora->Descripcion = $descripcion;
            $bitacora->save();
            return $bitacora;
        }

        public static function Login(){
            return ("este trait funciona muy bien para crear cosas");
        }

        public static function Logout(){
            return ("este trait funciona muy bien para crear cosas");
        }
    }

?>
