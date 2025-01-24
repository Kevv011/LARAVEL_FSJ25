<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Facada para empezar a usar Query Builder de Laravel

class QbuilderController extends Controller
{
    //Metodo para mostrar todos los datos
    public function index()
    {
        $users = DB::table('usuarios')->get();
        $pedidos = DB::table('pedidos')->get();

        return response()->json([
            'Message' => 'All data selected',
            'Users' => $users,
            'Orders' => $pedidos
        ], 200);
    }

    //Metodo para eliminar todos los registros de las tablas (Creado para prueba de inserciones)
    public function delete()
    {

        DB::table('usuarios')->delete();
        DB::statement('ALTER TABLE usuarios AUTO_INCREMENT = 1');

        return response()->json([
            'message' => 'Records delete successfully'
        ]);
    }

    // 1) Insercion de al menos 5 registros en tablas "users"
    public function insertUsuarios()
    {

        DB::table('usuarios')->insert([
            [
                'nombre' => 'kevin arevalo',
                'correo' => 'kevin@example.com',
                'telefono' => '+503 75489541'
            ],
            [
                'nombre' => 'valentina cuellar',
                'correo' => 'valentina@example.com',
                'telefono' => '+503 56487541'
            ],
            [
                'nombre' => 'juan perez',
                'correo' => 'kevin@example.com',
                'telefono' => '+503 75489541'
            ],
            [
                'nombre' => 'pepito fuentes',
                'correo' => 'pepito@example.com',
                'telefono' => '+503 45789744'
            ],
            [
                'nombre' => 'sergio arevalo',
                'correo' => 'sergio@example.com',
                'telefono' => '+503 12457844'
            ],
            [
                'nombre' => 'alexia bustamante',
                'correo' => 'alexia@example.com',
                'telefono' => '+503 89754112'
            ]
        ]);

        $users = DB::table('usuarios')->get();

        return response()->json([
            'Message' => 'Records created successfully',
            'Users' => $users
        ], 201);
    }

    // 1) Insercion de al menos 5 registros en tablas "pedidos"
    public function insertPedidos()
    {

        //Pedidos generados con tematica de compra de tecnologia
        DB::table('pedidos')->insert([
            [
                'producto' => 'Smarthphone samsung Galaxy S23',
                'cantidad' => 1,
                'total' => 535,
                'usuario_id' => 1
            ],
            [
                'producto' => 'Laptop alienware',
                'cantidad' => 1,
                'total' => 1100,
                'usuario_id' => 2
            ],
            [
                'producto' => 'Audifonos skull Candy',
                'cantidad' => 2,
                'total' => 50,
                'usuario_id' => 2
            ],
            [
                'producto' => 'PlayStation 5',
                'cantidad' => 1,
                'total' => 650,
                'usuario_id' => 2
            ],
            [
                'producto' => 'Monitor DELL 144hz',
                'cantidad' => 1,
                'total' => 135,
                'usuario_id' => 4
            ],
            [
                'producto' => 'Televisor panasonic 80"',
                'cantidad' => 2,
                'total' => 750,
                'usuario_id' => 5
            ],
            [
                'producto' => 'Iphone 16 pro max',
                'cantidad' => 1,
                'total' => 975,
                'usuario_id' => 3
            ],
            [
                'producto' => 'Impresora HP Deskjet',
                'cantidad' => 1,
                'total' => 225,
                'usuario_id' => 6
            ],
            [
                'producto' => 'Bocinas para desktop',
                'cantidad' => 2,
                'total' => 75,
                'usuario_id' => 4
            ],
            [
                'producto' => 'Mouse razer',
                'cantidad' => 1,
                'total' => 55,
                'usuario_id' => 1
            ]
        ]);

        $pedidos = DB::table('pedidos')->get();

        return response()->json([
            'Message' => 'Records created successfully',
            'Orders' => $pedidos
        ], 201);
    }

}
