<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'role',
    ];

    protected $hidden=[
        'id',
        'created_at',
        'updated_at'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    //----------Relaciones----------
    public function users()
    {
        return $this->hasMany(User::class, 'idrole'); //relación (N:1)(1,n)
    }
    //-----------Fin Relaciones--------
}
