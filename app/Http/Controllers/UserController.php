<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use App\Models\Datauser;

class UserController extends Controller
{

    public function index(Request $request)
{
    $sortBy = $request->query('sort_by', 'id'); // Campo de ordenación predeterminado
    $sortOrder = $request->query('sort_order', 'asc'); // Orden predeterminado
    //Variables de ordenación
    $usersQuery = User::orderBy($sortBy, $sortOrder);
    $usersCount = $usersQuery->count();
    //Comprobamos que la cantidad de usuarios sea menor de 15
    if ($usersCount <= 15) {
        $users = $usersQuery->get();
        $roles = Role::all();
        $userResource = UserResource::collection($users);
        return view('users.index', compact('userResource', 'users', 'roles', 'sortBy'));
    }
    //Paginamos los datos en caso de que sea mayor
    $users = $usersQuery->paginate(15);
    $roles = Role::all();
    $userResource = UserResource::collection($users);
    //Reenviamos los datos ordenados
    return view('users.index', compact('userResource', 'users', 'roles', 'sortBy', 'sortOrder'));
}


	//Función que controla la vista de creación
	public function create(){
		return view('users.register');
	}//end create

//Función que elimina los datos del usuario seleccionado
	public function destroy(User $user){
		$user->delete();
		return redirect()->route('user.index')->with('success', 'El usuario se ha eliminado correctamente');
	}

//Función que controla la vista de edición los datos del usuario

public function edit(User $user)
{
    $users=User::find($user);
    $roles = Role::all();
    $userResource = UserResource::collection($users);

    return view('users.index', compact('user', 'users', 'roles', 'userResource'));
}

	//Función que controla el acceso del usuario
	public function login(){
		return view('users.login');
	}//end login

    //Función que permite filtrar los usuarios
    public function search(Request $request)
{
    $sortBy = $request->query('sort_by', 'id'); // Campo de ordenación predeterminado
    $sortOrder = $request->query('sort_order', 'asc'); // Orden predeterminado

    $query = User::query();

    if ($request->has('idrole')) {
        $query->whereHas('role', function ($q) use ($request) {
            $q->where('role', 'like', '%' . $request->input('idrole') . '%');
        });
    }

    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    if ($request->has('email')) {
        $query->where('email', 'like', '%' . $request->input('email') . '%');
    }

    // Nos aseguramos de que los datos estén ordenados y paginados
    $users = $query->orderBy($sortBy, $sortOrder)->paginate(15);

    $roles = Role::all();
    $userResource = UserResource::collection($users);

    return view('users.index', compact('userResource', 'users', 'roles', 'sortBy', 'sortOrder'));
}



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
