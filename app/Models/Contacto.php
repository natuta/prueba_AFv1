<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table = 'contactos';
    protected $primaryKey = 'id_contacto';
    protected $fillable = [
        'direccion',
        'celular',
        'telefono',
        'email_personal',
    ];
//TODO: relacion entre usuario y contacto esta al reves. corregir.
    public function User(){
        return $this->hasOne(User::class, 'contacto_id');
    }

    public function proveedor(){
        return $this->hasOne(Proveedor::class,'contacto_id');
    }
}
