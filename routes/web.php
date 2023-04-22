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

/*Ruta del controlador para crear usuarios*/
Route::get('/users/create',[userController::class, 'create'])->name('user.create');

Route::delete('/users/destroy/{user}',[UserController::class, 'destroy'])->name('user.destroy');

/*Acceso usuarios*/
Route::get('/users/login',[userController::class, 'login'])->name('user.login');

/*Ruta al controlador para editar un usuario*/
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('user.edit');

/*Ruta del controlador para almacenar los datos de usuario  */
Route::post('/users/store',[UserController::class, 'store'])->name('user.store');

/*Ruta del controlador para actualizar los datos de usuario  */
Route::put('/users/update/{user}',[UserController::class, 'update'])->name('user.update');

/* Mostrar los datos de los comic en su index*/
Route::view('/comics','comics.index')->name('comic.index');


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
