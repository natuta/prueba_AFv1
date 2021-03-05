<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adquisicion extends Model
{
    use HasFactory;
    protected $table='adquisiciones';
    protected $primaryKey='id_adquisicion';
    protected $fillable=[
        'fecha','almacen_id','proveedor_id','user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }

    public function almacen(){
        return $this->belongsTo(Almacen::class,'almacen_id');
    }

    public function Det_Adquisicion(){
        return $this->hasMany(Detalle_Adquisicion::class,'adquisicion_id');
    }
}
