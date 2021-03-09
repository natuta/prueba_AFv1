<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision_Tecnica extends Model
{
    use HasFactory;
    protected $table='revisiones_tecnicas';
    protected $primaryKey='id_revision';
    protected $fillable=[
        'fecha','user_id','af_id','estado_id','conclusion'
    ];

    public function egreso(){
        return $this->hasOne(Egreso::class,'revision_id');
    }

    public function mantenimiento(){
        return $this->hasOne(Mantenimiento::class,'revision_id');
    }

    public function revaluo(){
        return $this->hasMany(Revaluo::class,'revision_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function activo(){
        return $this->belongsTo(Activo_Fijo::class,'AF_id');
    }

    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }
}
