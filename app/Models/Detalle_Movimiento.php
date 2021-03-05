<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Movimiento extends Model
{
    use HasFactory;
    protected $table = 'detalles_movimientos';
    protected $primaryKey = 'id_det_mov';
    protected $fillable =
        [
            'solicitud_mov_id','destino_dpto','origen_dpto','af_id','cantidad'

        ];

    public function activo(){
        return $this->belongsTo(Activo_Fijo::class,'af_id');
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class,'destino_dpto');
    }

    public function solicitud_movimiento(){
        return $this->belongsTo(Solicitud_Movimiento::class,'solicitud_mov_id');
    }
}
