<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'correo',
        'clave'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'clave',
        'remember_token',
    ];

    // getAuthPassword para que el attempt obtenga el hash de la db
    public function getAuthPassword() {
        return $this->clave;
    }

    
    // relaciones
    public function getProfile()
    {   
        return $this->belongsTo('App\Models\Profile','perfil_id');
    }

}
