<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes Auth
|--------------------------------------------------------------------------
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/userinfo', [AuthController::class, 'userinfo'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
|--------------------------------------------------------------------------
| API Login Trasnsaction Acount [Required login for Auth:sanctum]
|--------------------------------------------------------------------------
*/
Route::post('/create_acount', [TransactionController::class, 'create_acount'])->middleware('auth:sanctum');
Route::post('/tramitar', [TransactionController::class, 'tramite'])->middleware('auth:sanctum');
Route::post('/get_tipo_tramite', [TransactionController::class, 'get_tipo_tramite'])->middleware('auth:sanctum');
Route::post('/get_tipo_cuenta', [TransactionController::class, 'get_tipo_cuenta'])->middleware('auth:sanctum');


