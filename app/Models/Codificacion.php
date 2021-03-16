<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codificacion extends Model
{
    use HasFactory;
    protected $table='codificaciones';
    protected $primaryKey='id_codificacion';
    protected $fillable=[
        'AF_id','codigo',
    ];
    public function activo(){
        return $this->belongsTo(Activo_Fijo::class,'AF_id');
    }


}
