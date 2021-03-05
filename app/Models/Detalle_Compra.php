<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Compra extends Model
{
    use HasFactory;
    protected $table = 'detalles_de_compras';
    protected $primaryKey='id_det_compra';
    protected $fillable = [
        'detalle','categoria_id','sol_compra_id','cantidad','costo','total1'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    public function solicitud_compra(){
        return $this->belongsTo(Solicitud_Compra::class,'sol_compra_id');
    }
}
