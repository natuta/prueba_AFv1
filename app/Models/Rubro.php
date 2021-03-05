<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;
    protected $table = 'rubros';
    protected $primaryKey = 'id_rubro';
    protected $fillable = [
        'nombre',
        'descripcion',
        'vida_util',
        'coeficiente_depr',
    ];

    public function categoria(){
        return $this->hasOne(Categoria::class,'rubro_id');
    }
}
