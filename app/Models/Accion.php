<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $table = 'acciones';
    protected $primaryKey = 'id_accion';
    protected $fillable = [
        'nombre'
    ];

    public function bitacora(){
        return $this->hasMany(Bitacora::class,'accion_id');
    }
}
