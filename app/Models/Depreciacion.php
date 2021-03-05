<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depreciacion extends Model
{
    use HasFactory;
    protected $table='depreciaciones';
    protected $primaryKey='id_depreciacion';
    protected $fillable=[
        'depreciacion_acumulada','descripcion','fecha','AF_id',
    ];

    public function activo(){
        return $this->belongsTo(Activo_Fijo::class,'AF_id');
    }
}
