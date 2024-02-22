<?php

use App\Http\Controllers\Api\ResultatsAprenentatgeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\UsuarisController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('usuaris/prueba', [App\Http\Controllers\Api\UsuarisController::class, 'prueba'])->name('usuaris.prueba');
Route::put('usuaris/{usuari}/moduls', [App\Http\Controllers\Api\UsuarisController::class, 'asignarModuls'])->name('usuaris.asignarModuls');

Route::apiResource('usuaris',UsuarisController::class);
Route::apiResource('resultats_aprenentatge',App\Http\Controllers\Api\ResultatsAprenentatgeController::class);
Route::apiResource('criteris_avaluacio',App\Http\Controllers\Api\CriterisAvaluacioController::class);



