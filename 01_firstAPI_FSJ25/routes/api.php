<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Proporciona una URL para hacer funcionar un controlador 
Route::get('tasks', [TaskController::class, 'index']);  //Forma mas moderna de llamar al controlador con GET
Route::post('tasks', [TaskController::class, 'store']); //Forma mas moderna de enviar datos con POST

//Route::get('tasks', 'App\Http\Controllers\TaskController@index');  FORMA ANTIGUA CON TODA LA UBICACION