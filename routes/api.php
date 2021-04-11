<?php

namespace App\Http\Controllers;

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

Route::group(['middleware' => 'api'], function ($router) {

    Route::get('/', function () {
        return response()->json(['message' => 'JWT API', 'status' => 'Conectado']);
    });

    /*ROUTE ERROR*/
    Route::fallback(function () {
        return response()->json(['message' => 'Rota não encontrada', 'status' => 'Conectado']);
    });

    /*AUTH*/
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('create', [AuthController::class, 'create']);
});
