<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoresController;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Route::apiResource('colores/',ColoresController::class);
//Route::apiResource('photos', PhotoController::class);

Route::GET('colores/',[ColoresController::class, 'index']);
Route::GET('colores/{colores}',[ColoresController::class, 'show']);
Route::POST('colores/',[ColoresController::class, 'store']);
Route::MATCH( ['PUT', 'PATCH'], 'colores/{colores}', [ColoresController::class, 'update']);
Route::DELETE('/colores/{colores}', [ColoresController::class, 'destroy']);
