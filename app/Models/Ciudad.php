<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table='ciudades';
    protected $primaryKey='id_ciudad';
    protected $fillable=[
        'nombre'
    ];


    public function ciudad(){
        return $this->hasMany(Edificio::class,'ciudad_id');
    }
}
