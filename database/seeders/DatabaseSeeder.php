<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //-------------------------------------------//
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //----------------------------------------------//
        DB::table('roles')->insert([
            ['role'=>'Administrador'],
            ['role'=>'Colaborador'],
            ['role'=>'Coleccionista']
        ]);

        DB::table('users')->insert([
            ['name'=>'admin',
            'email'=>'admin@comicchange.es',
            'password'=>Hash::make('admin'),
            'idrole'=>'1'],
            ['name'=>'coworker',
            'email'=>'coworker@comicchange.es',
            'password'=>Hash::make('coworker'),
            'idrole'=>'2']
        ]);

        DB::table('datausers')->insert([
            ['user_id'=>'1',
            'age'=>null,
            'city'=>null,
            'country'=>'España',
            'cp'=>null,
            'gender'=>'Masculino',
            'img'=>null
            ],
            ['user_id'=>'2',
            'age'=>'48',
            'city'=>'Burgos',
            'country'=>'España',
            'cp'=>'09007',
            'gender'=>'Prefiero no decirlo',
            'img'=>null
            ]
        ]);

        //Creamos una base de datos temporal para hacer pruebas
        User::factory()->count(50)->create();
    }
}
