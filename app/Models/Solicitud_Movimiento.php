<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud_Movimiento extends Model
{
    use HasFactory;
    protected $table = 'solicitudes_movimientos';
    protected $primaryKey='id_sol_mov';
    protected $fillable = [
        'solicitud_id',
    ];


    public function solicitud(){
        return $this->belongsTo(Solicitud::class,'solicitud_id');
    }

    public function detalle_movimiento(){
        return $this->hasOne(Detalle_Movimiento::class,'solicitud_mov_id');
    }
}
