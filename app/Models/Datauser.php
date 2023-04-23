<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datauser extends Model
{
    use HasFactory;

    //-------------Relaciones----------------
    public function user()
    {
        return $this->belongsTo(User::class); //Relación (1:1)
    }
    //-----------Fin Relaciones--------------
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'age',
        'city',
        'country',
        'cp',
        'gender',
        'img'
    ];

    protected $hidden=[
        'iddatauser'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'age' => 'tinyInt'
    ];
}
