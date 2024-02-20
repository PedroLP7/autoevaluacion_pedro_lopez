<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarisController;


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

Route::get('/', function () {
    return view('prueba');
});
Route::get('usuaris/{usuari}/showpass', [UsuarisController::class, 'showpass'])->name('usuaris.showpass');
Route::put('usuaris/updatepass/{usuari}', [UsuarisController::class, 'updatePassword'])->name('usuaris.updatePassword');
Route::resource('usuaris', UsuarisController::class);
Route::get('/loginForm',[UsuarisController::class, 'showLogin'])->name('loginForm');
route::post('/login',[UsuarisController::class, 'login'])->name('login');
route::get('/logout',[UsuarisController::class, 'logout'])->name('logout');




