<?php

use App\Http\Controllers\API\EstacionamientoController;
use App\Http\Controllers\API\CajonesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('estacionamiento', [EstacionamientoController::class, 'index']);
Route::get('cajones', [CajonesController::class, 'index']);
Route::post('estacionamiento', [EstacionamientoController::class, 'store']);
Route::post('cajones', [CajonesController::class, 'store']);
Route::get('estacionamiento/{estacionamiento}', [EstacionamientoController::class, 'show']);
Route::get('cajones/{cajones}', [CajonesController::class, 'show']);
Route::put('estacionamiento/{estacionamiento}', [EstacionamientoController::class, 'update']);