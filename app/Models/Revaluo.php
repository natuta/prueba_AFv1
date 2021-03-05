<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revaluo extends Model
{
    use HasFactory;
    protected $table='revaluos';
    protected $primaryKey='id_revaluo';
    protected $fillable=[
        'revision_id','AF_id','estado_id','fecha','monto','descripcion',
    ]; //TODO: preguntar si aqui corresponde que haya relacion con la clase ESTADO

    public function revision(){
        return $this->belongsTo(Revision_Tecnica::class,'revision_id');
    }

    public function activo(){
        return $this->belongsTo(Activo_Fijo::class,'AF_id');
    }
}
