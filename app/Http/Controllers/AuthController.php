<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller{

  public function createUser(CreateUserRequest $request)
  {

  //Creamos un objeto usuario para comparar y hacer login
  User::create([
    'idrole'=>'3',
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>Hash::make($request->password)
  ]);

  //En caso de que el usuario sea correcto, lanzamos un mensaje y creamos un token de sesión
  return back()->with('success', 'El usuario se ha creado correctamente');
  }//end create user

  public function loginUser(LoginRequest $request){
    if(!Auth::attempt($request->only(['email','password']))){
      return back()->withErrors(['failed'=> 'El Correo o la Contraseña no están en el sistema']);
    }//end if

    $user=User::where('email',$request->email)->first();
    Session::flash('success', 'Acceso concedido');
      switch($user->idrole){
        case 1:
          return redirect()->route('user.index');
          break;
        case 2:
          return redirect()->route('comic.index');
          break;
        default:
          return redirect()->route('index');
      }//end switch
  }
}
