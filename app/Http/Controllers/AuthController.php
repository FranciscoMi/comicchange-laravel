<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller{
//Controlador para autentificar al usuario en el sistema

//Función que controla la vista de edición los datos del usuario
public function edit(User $user){
    $roles = Role::all();
    $userResource=UserResource::collection(User::all());
    return view('users.index',compact('user','roles','userResource'));
}//end edit

//funcion que crea al usuario
public function createUser(UserRequest $request)
  {
    //Antes de hacer nada compruebo que el correo ya está en el sistema
    $mail = $request->input('email');

    // Verificar si el correo electrónico ya existe
    $existingUser = DB::table('users')->where('email', $mail)->first();


    if ($existingUser) {
        // El correo electrónico ya existe, muestra un mensaje de error o realiza alguna acción adecuada
        return back()->with('failed', 'El correo electrónico ya está en uso');
    }
    //Validamos los datos
    $validatedData = $request->validated();
  // Guardar el objeto User en la base de datos
  $user=User::create([
    'idrole'=>$request->idrole,
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>Hash::make($request->password),
  ]);

    //Actualizamos la tabla datos de usuarios
    $datauser = $user->datauser;
    $datauser->age = $validatedData['age'];
    $datauser->city = $validatedData['city'];
    $datauser->country = $validatedData['country'];
    $datauser->cp = $validatedData['cp'];
    $datauser->gender = $validatedData['gender'];
    $datauser->save();

    //En caso de que el usuario sea correcto, lanzamos un mensaje y creamos un token de sesión
     // Devolver la respuesta con el recurso como respuesta y el token
     $token = $user->createToken("API TOKEN")->plainTextToken;
     return back()->with([
      'api_token'=>$token,
      'success'=>'El usuario se ha creado correctamente']);

  }//end create user

  public function loginUser(LoginRequest $request)
{
    if(!Auth::attempt($request->only(['email','password'])))
    {
        return back()->with('failed','El Correo o la Contraseña no están en el sistema');
    }

    $user = User::where('email', $request->email)->first();
    $token = $user->createToken("API TOKEN")->plainTextToken;

    // Almacenamos el token en la sesión del usuario
    session()->put('api_token', $token);

    switch ($user->idrole) {
        case 1:
            return redirect()->route('user.index')->with('api_token', $token);
        case 2:
            return redirect()->route('comic.index')->with('api_token', $token);
        default:
            return redirect()->route('index')->with('api_token', $token);
    }
}//fin loginUser

//función para cerrar la sesión
public function logout()
{
    Auth::logout();
    Session::flush();

    return redirect('/')->with('success', 'Sesión cerrada correctamente');
}//fin función logout


}
