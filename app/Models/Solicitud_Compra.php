<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud_Compra extends Model
{
    use HasFactory;
    protected $table = 'solicitudes_compras';
    protected $primaryKey='id_sol_compra';
    protected $fillable = [
        'nombre','proveedor_id','solicitud_id',
    ];

    public function solicitud(){
        return $this->belongsTo(Solicitud::class,'solicitud_id');
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }

    public function detalle_compra(){
        return $this->hasOne(Detalle_Compra::class,'sol_compra_id');
    }
}
