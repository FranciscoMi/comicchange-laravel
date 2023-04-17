<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

/* Mostrar los datos del usuario en su index*/
Route::get('/users',[UserController::class, 'index'])->name('user.index');
/*Route::get('/users/{id}',[UserController::class,'edit'])->name('user.edit');*/

/*Crea usuarios*/
Route::get('/users/create',[userController::class, 'create'])->name('user.create');

/*Almacenamos los datos de usuario encriptados del formulario */
Route::post('/users/store',[UserController::class, 'store'])->name('user.store');







/*Acceso usuarios*/
Route::get('/users/login',[userController::class, 'login'])->name('user.login');

Route::view('/comics','comics.index')->name('comics');


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
});*/

require __DIR__.'/auth.php';
