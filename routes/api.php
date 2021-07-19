<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoresController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login/',[UserController::class, 'login']);
//Route::get('colores/',[ColoresController::class, 'index']);
Route::middleware(['auth:api', 'role'])->group(function() {
    Route::middleware(['scope:admin,user'])->get('colores/',[ColoresController::class, 'index']);
    Route::middleware(['scope:admin,user'])->get('colores/{colores}',[ColoresController::class, 'show']);
    Route::middleware(['scope:admin'])->post('colores/',[ColoresController::class, 'store']);
    Route::middleware(['scope:admin'])->match( ['PUT', 'PATCH'], 'colores/{colores}', [ColoresController::class, 'update']);
    Route::middleware(['scope:admin'])->delete('/colores/{colores}', [ColoresController::class, 'destroy']);
});