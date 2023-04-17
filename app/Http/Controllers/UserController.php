<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function index(){
		$users = User::all();
		return view('users.index',compact('users'));
	}
	//Muestra el cuadro de registro
	public function create(){
		return view('users.register');
	}

	//Muestra el cuadro de login
	public function login(){
		return view('users.login');
	}

    //Función que recoge las peticiones POST del formulario
  	public function store(Request $request){
      //Almacenamos los datos del usuario en una nueva variable
      User::create([
        'idrole'=>'3',
        'name'=> $request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password)
      ]);

      // Almacenar mensaje de éxito
    Session::flash('success', 'El usuario se ha creado correctamente');

      //redirijo al usuario a la página de donde partió
      return back();
	}

    //Función que edita los datos del usuario
    /*public function edit(User $users){
        $users = User::all();
        return view('users.index',compact('users'));
    }*/
}
