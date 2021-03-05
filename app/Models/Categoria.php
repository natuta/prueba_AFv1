<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_categoria';
    protected $table = 'categorias';
    protected $fillable = [
        'nombre',
        'descripcion',
        'depreciar',
        'actualiza',
        'rubro_id',
    ];

    public function activo(){
        return $this->hasOne(Activo_Fijo::class, 'categoria_id');
    }

    public function rubro(){
        return $this->belongsTo(Rubro::class,'rubro_id');
    }

    public function detalle_compra(){
        return $this->hasMany(Detalle_Compra::class,'categoria_id');
    }

    public function det_solicitud(){
        return $this->hasOne(Detalle_Solicitud::class,'categoria_id');
    }
}
