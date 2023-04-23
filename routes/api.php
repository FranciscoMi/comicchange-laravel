<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatauserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Ruta para modificar los datos de los usuarios a través de una API-REST
Route::resource('/datauser',DatauserController::class);

//Rutas para login y access
//Acceso al panel de creación de usuarios
Route::post('/users/createUser',[AuthController::class, 'createUser'])->name('user.createAuth');

//Acceso al panel de autenticación de usuarios
Route::post('/users/loginUser',[AuthController::class, 'loginUser'])->name('user.loginAuth');

//Ruta middleware para controlar los tokens de autorización
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



