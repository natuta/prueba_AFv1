<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'apellido', 'email', 'password','sexo','estado_id',//'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function contacto(){
        return $this->belongsTo(Contacto::class,'contacto_id');
    }

    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id');
    }

    public function estado(){
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function adquisicion()
    {
        return $this->hasMany(Adquisicion::class, 'user_id');
    }

    public function departamento(){
        return $this->hasMany(Departamento::class,'user_id');
    }

    public function revision(){
        return $this->hasMany(Revision_Tecnica::class,'user_id');
    }

    public function solicitud(){
        return $this->hasMany(Solicitud::class,'user_id');
    }

    public function bitacora(){
        return $this->hasMany(Bitacora::class,'user_id');
    }

}
