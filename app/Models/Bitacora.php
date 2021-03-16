<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'bitacoras';
    protected $primaryKey = 'id_bitacora';
    protected $fillable = [
        'fecha','descripcion','accion_id','user_id'
    ];

    public function accion(){
        return $this->belongsTo(Accion::class,'accion_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
