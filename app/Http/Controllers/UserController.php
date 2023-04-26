<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Datauser;

class UserController extends Controller
{
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
    $userId=User::find($user);
    $roles = Role::all();
    $userResource=UserResource::collection(User::all());
	return view('users.index',compact('user','roles','userResource'));
  }

	//Función que controla el acceso del usuario
	public function login(){
		return view('users.login');
	}//end login

  //Función que almacena los datos de los usuarios
  public function store(CreateUserRequest $request){
	//Almacenamos los datos del usuario en una nueva variable
    User::create([
	  'idrole'=>'3',
	  'name'=> $request->name,
	  'email'=>$request->email,
	  'password'=>Hash::make($request->password)
	]);

	  //redirijo al usuario a la página de donde partió con un mensaje de éxito
	  return back()->with('success', 'El usuario se ha creado correctamente');
	}//end store

	/*public function update(UserRequest $request, User $user){
		$user->name = $request->input('name');
		$user->idrole = $request->input('idrole');
		if ($request->input('password')!=null){
			$user->password = Hash::make($request->input('password'));
		}else{
			$user->password =$user->password;
		};
		$user->save();



	  return back()->with('success', 'El usuario se ha actualizado correctamente');
	}//end update*/

    public function update(UserRequest $request, User $user){
        //Validamos los datos
        $validatedData = $request->validated();
        //actualizamos la tabla usuarios
        $user->name = $validatedData['name'];
        $user->idrole = $validatedData['idrole'];
        if (!empty($validatedData['password'])){
            $user->password = Hash::make($validatedData['password']);
        }
        $user->save();
        //Actualizamos la tabla datos de usuarios
        $datauser = $user->datauser;
        $datauser->age = $validatedData['age'];
        $datauser->city = $validatedData['city'];
        $datauser->country = $validatedData['country'];
        $datauser->cp = $validatedData['cp'];
        $datauser->gender = $validatedData['gender'];
        $datauser->save();

	  return back()->with('success', 'El usuario se ha actualizado correctamente');
	}//end update*/

}
