<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

  public function createUser(CreateUserRequest $request)
  {
  //Creamos un objeto usuario para comparar y hacer login
    $user=User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>Hash::make($request->password),
    'idrole'=>'3'
    ]);

  //En caso de que el usuario sea correcto, lanzamos un mensaje y creamos un token de sesión
    return response()->json([
      'status'=>true,
      'message'=>'Usuario creado correctamente',
      'token'=>$user->createToken("API TOKEN")->plainTextToken
    ],200); //200, código de mensaje
  }//end create user

  public function loginUser(LoginRequest $request){
    if(!Auth::attempt($request->only(['email','password']))){
      return response()->json([
        'status'=>false,
        'message'=>'El Correo o la Contraseña no están en el sistema'
      ],401); //código de error
    }//end if

    $user=User::where('email',$request->email)->first();

    return response()->json([
      'status'=>true,
      'message'=>'Acceso concedido',
      'token'=>$user->createToken("API TOKEN")->plainTextToken
    ],200);
  }
}
