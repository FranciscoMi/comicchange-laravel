<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //------------Relaciones-------------

    //Ejecutamos el método boot cuando se instancie el modelo
    protected static function boot()
    {
        parent::boot();
        //Si se elimina el usuario de la tabla user, también del de la tabla datauser
        static::deleting(function ($user) {
            $user->datauser()->delete();
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole'); //Relación (N:1)(n,1)
    }

    public function datauser()
    {
        return $this->hasOne(Datauser::class,'user_id')->withDefault(); //Relación (1:1)
    }
    //-----------------Fin Relaciones-----------

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'name',
        'email',
        'password',
        'idrole'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'idrole'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
