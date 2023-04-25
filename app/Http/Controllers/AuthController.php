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

class AuthController extends Controller{

	public function index(){
		$users = User::all();
        $roles = Role::all();
        $userResource=UserResource::collection(User::all());
		return view('users.index',compact('userResource','users','roles'));
	}//end index

	//Función que controla la vista de creación
	public function create(){
		return view('users.register');
	}//end create

//Función que elimina los datos del usuario seleccionado
	public function destroy(User $user){
		$user->delete();
		return back()->with('success', 'El usuario se ha eliminado correctamente');
	}

  //Función que controla la vista de edición los datos del usuario
public function edit(User $user){
    $roles = Role::all();
    $userResource=UserResource::collection(User::all());
    //$userArray=new UserResource($user);
    return view('users.index',compact('user','roles','userResource'));
}//end edit

//funcion que crea al usuario
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
