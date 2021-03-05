<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;
    protected $table='egresos';
    protected $primaryKey='id_egreso';
    protected $fillable=[
        'revision_id','fecha','descripcion',
    ];

    public function revision(){
        return $this->belongsTo(Revision_Tecnica::class,'revision_id');
    }

    protected $casts = [
        'fecha' => 'date',
    ];
}
