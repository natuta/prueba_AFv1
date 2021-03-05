<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table='proveedores';
    protected $primaryKey='id_proveedor';
    protected $fillable=[
        'nombre','contacto_id','estado_id',
    ];

    public function solicitud_compra(){
        return $this->hasMany(Solicitud_Compra::class,'proveedor_id');
    }

    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }

    public function contacto(){
        return $this->belongsTo(Contacto::class,'contacto_id');
    }
}
