<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AuthController;

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


//Rutas para login y access
//Acceso al panel de creación de usuarios
Route::post('/users/create',[AuthController::class, 'createUser'])->name('user.create');

//Acceso al panel de autenticación de usuarios
Route::get('/users/login',[AuthController::class, 'loginUser'])->name('user.login');

//Ruta middleware para controlar los tokens de autorización
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



