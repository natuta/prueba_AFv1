<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    protected $table='mantenimientos';
    protected $primaryKey='id_mantenimiento';
    protected $fillable=[
        'problema','solucion','fecha_inicio','fecha_fin','duracion','costo','revision_id',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function revision(){
        return $this->belongsTo(Revision_Tecnica::class,'revision_id');
    }
}
