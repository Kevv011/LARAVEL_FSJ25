<?php

use App\Http\Controllers\TaskController; //Controlador Task
use App\Http\Controllers\UserController; //Controlador User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Rutas del CRUD "Tasks"
Route::get('tasks', [TaskController::class, 'index']);           //Forma moderna de llamar al controlador con GET
Route::post('tasks', [TaskController::class, 'store']);          //Forma moderna de enviar datos con POST
Route::put('tasks/{id}', [TaskController::class, 'update']);     //Forma moderna de actualizar datos con PUT
Route::delete('tasks/{id}', [TaskController::class, 'destroy']); //Forma moderna de eliminar datos con DELETE

//Rutas de User
Route::post('register', [UserController::class, 'register']);  //Registrar un Usuario




//Route::get('tasks', 'App\Http\Controllers\TaskController@index');  FORMA ANTIGUA CON TODA LA UBICACION