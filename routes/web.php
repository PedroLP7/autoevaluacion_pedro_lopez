<?php

use GuzzleHttp\Middleware;
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

Route::get('/loginForm',[UsuarisController::class, 'showLogin'])->name('login');
route::post('/login',[UsuarisController::class, 'login']);
route::get('/logout',[UsuarisController::class, 'logout'])->name('logout');





Route::middleware(['auth'])->group(function () {

    route::get('/home', function () {
        return view('home');
    })->name('home');

//     Route::get('usuaris/{usuari}/showpass', [UsuarisController::class, 'showpass'])->name('usuaris.showpass');
// Route::put('usuaris/updatepass/{usuari}', [UsuarisController::class, 'updatePassword'])->name('usuaris.updatePassword');
// Route::resource('usuaris', UsuarisController::class);


Route::middleware(['checkAdmin'])->group(function () {
    Route::get('usuaris/{usuari}/showpass', [UsuarisController::class, 'showpass'])->name('usuaris.showpass');
    Route::put('usuaris/updatepass/{usuari}', [UsuarisController::class, 'updatePassword'])->name('usuaris.updatePassword');
    Route::resource('usuaris', UsuarisController::class);



});









Route::middleware(['checkProfe'])->group(function () {

    route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');



});



Route::middleware(['checkAlumne'])->group(function () {

    // route::get('/alumne', function () {
    //     return view('alumne');
    // })->name('alumne');

//PONER LAS RUTAS A LAS QUE SOLO POUEDEN ACCEDER LOS ALUMNOS

    });










});
