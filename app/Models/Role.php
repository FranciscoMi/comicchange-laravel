<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //Relaciones
    public function users()
    {
        return $this->hasMany(User::class); //relación (N:1)(1,n)
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'role',
    ];

    protected $hidden=[
        'id'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
}
