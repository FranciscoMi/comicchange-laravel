<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*mostrar la landing-page*/
Route::view('/','index')->name('index');



/*Rutas para el panel de usuarios. Acceso solo Administradores*/
Route::middleware('auth:sanctum','admin')->group(function(){

    /* Mostrar los datos del usuario en su index*/
    Route::get('/users',[UserController::class, 'index'])->name('user.index');

	/*Ruta al controlador para editar un usuario*/
	Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('user.edit');

	/*Ruta del controlador para actualizar los datos de usuario  */
	Route::put('/users/update/{user}',[UserController::class, 'update'])->name('user.update');

    /* Mostrar los datos de los comic en su index*/
    Route::view('/comics','comics.index')->name('comic.index');

    /*Ruta del controlador para almacenar los datos de usuario  */
    Route::post('/users/storeUser',[AuthController::class, 'createUser'])->name('user.storeUser');

});//end middleware admin group

/*Rutas para el panel de usuarios. Acceso Administradores y colaboradores*/
Route::middleware('auth:sanctum','Colaborador')->group(function(){
     /* Mostrar los datos de los comic en su index*/
     Route::view('/comics','comics.index')->name('comic.index');
});

/*Ruta del controlador para eliminar usuarios*/
Route::delete('/users/destroy/{user}',[UserController::class, 'destroy'])->name('user.destroy');

/*Ruta del controlador para crear usuarios*/
Route::get('/users/create',[UserController::class, 'create'])->name('user.create');

/*Acceso usuarios*/
Route::get('/users/login',[UserController::class, 'login'])->name('user.login');

/*Ruta del controlador para almacenar los datos de usuario  */
Route::post('/users/store',[UserController::class, 'store'])->name('user.store');

/* Mostrar los datos de los comic en su index*/
Route::view('/comics','comics.index')->name('comic.index');

//Acceso desde panel de creación de usuarios
Route::post('/users/createUser',[AuthController::class, 'createUser'])->name('user.createAuth');
//Acceso desde el panel de autenticación de usuarios
Route::post('/users/loginUser',[AuthController::class, 'loginUser'])->name('user.loginAuth');


//rutas Generadas por Laravel
/*Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';*/
