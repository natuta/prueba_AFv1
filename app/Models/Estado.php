<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table= 'estados';
    protected $primaryKey='id_estado';
    protected $fillable=[
        'nombre','descripcion'
    ];

    public function user(){
        return  $this->hasOne(User::class, 'estado_id');
    }

    public function activo(){
        return $this->hasOne(Activo_Fijo::class,'estado_id');
    }

    public function codificacion(){
        return $this->hasOne(Codificacion::class,'estado_id');
    }

    public function proveedor(){
        return $this->hasOne(Proveedor::class,'estado_id');
    }

    public function revision(){
        return $this->hasOne(Revision_Tecnica::class,'estado_id');
    }


}
