<?php

use Illuminate\Http\Request;
use App\Http\Controllers\QbuilderController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('usersOrders', [QbuilderController::class, 'index']);
Route::post('usersOrders', [QbuilderController::class, 'insert']);
