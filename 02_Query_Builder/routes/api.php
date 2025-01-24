<?php

use Illuminate\Http\Request;
use App\Http\Controllers\QbuilderController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('usuarios_ordenes', [QbuilderController::class, 'index']);
Route::post('usuarios', [QbuilderController::class, 'insertUsuarios']);
Route::post('pedidos', [QbuilderController::class, 'insertPedidos']);
Route::delete('usuarios_ordenes', [QbuilderController::class, 'delete']);
