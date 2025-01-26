<?php

use Illuminate\Http\Request;
use App\Http\Controllers\QbuilderController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('usuarios_ordenes', [QbuilderController::class, 'index']);       //Ruta para obtener todos los registros
Route::delete('usuarios_ordenes', [QbuilderController::class, 'delete']);   //Ruta para eliminar todos los registros

Route::post('usuarios', [QbuilderController::class, 'insertUsuarios']);     //(Ejercicio #1) Ruta para agregar registros de los usuarios
Route::post('pedidos', [QbuilderController::class, 'insertPedidos']);       //(Ejercicio #1) Ruta para agregar registros de los pedidos  
Route::get('pedidos_02', [QbuilderController::class, 'getUser2']);          //(Ejercicio #2) Ruta obtener pedidos de usuario con ID 2    
Route::get('detalle', [QbuilderController::class, 'detailOrder']);          //(Ejercicio #3) Ruta para obtener pedidos con nombre e email de usuario 
Route::get('total_range', [QbuilderController::class, 'rangeOrders']);      //(Ejercicio #4) Ruta para obtener pedidos en un rango de $100 y $250
Route::get('R_users', [QbuilderController::class, 'user_with_r']);          //(Ejercicio #5) Ruta para filtrar usuarios que inician con R
Route::get('user_5', [QbuilderController::class, 'totalUser5']);            //(Ejercicio #6) Ruta para contar los pedidos del usuario con ID 5
Route::get('descOrders', [QbuilderController::class, 'descOrders']);        //(Ejercicio #7) Ruta para filtrar pedidos con sus usuarios en orden DESC
Route::get('total', [QbuilderController::class, 'sumTotal']);               //(Ejercicio #8) Ruta para obtener total de dinero de los pedidos
Route::get('cheapest_total', [QbuilderController::class, 'minTotal']);      //(Ejercicio #9) Ruta para obtener el pedido mas economico con el nombre de usuario asociadp
Route::get('filtro_pedidos', [QbuilderController::class, 'orders']);        //(Ejercicio #10) Ruta para obtener el producto, la cantidad y el total de cada pedido, agrupándolos por usuario