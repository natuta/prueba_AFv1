<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamentos';
    protected $primaryKey = 'id_departamento';
    protected $fillable = [
        'nombre','descripcion','edificio_id',
    ];

    public function activo(){
        return $this->hasMany(Activo_Fijo::class,'departamento_id');
    }

    public function edificio(){
        return $this->belongsTo(Edificio::class,'edificio_id');
    }

    public function solicitud_movimiento(){
        return $this->hasMany(Solicitud_Movimiento::class,'destino_dpto');
    }

}
