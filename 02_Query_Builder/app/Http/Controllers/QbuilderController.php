<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Facada para empezar a usar Query Builder de Laravel

class QbuilderController extends Controller
{
    //Metodo para mostrar todos los datos
    public function index() {
        $users = DB::table('users')->get();
        $pedidos = DB::table('pedidos')->get();

        return response()->json([
            'Message' => 'All data selected',
            'Users' => $users,
            'Orders' => $pedidos
        ], 200);
    }

    // 1) Insercion de 5 registros en tablas "users" y "pedidos"
    public function insert() {

        $users = DB::table('users')->insert([
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

    $pedidos = DB::table('pedidos')->insert([
        [
            'producto' => 'Papa Lays',
            'cantidad' => 2,
            'total' => 2.00,
            'id_usuario' => 1
        ],
        [
            'producto' => 'Lata cocacola',
            'cantidad' => 1,
            'total' => 0.85,
            'id_usuario' => 2
        ],
        [
            'producto' => 'Pan dulce',
            'cantidad' => 10,
            'total' => 3.00,
            'id_usuario' => 2
        ],
        [
            'producto' => 'Sopa maruchan',
            'cantidad' => 3,
            'total' => 2.70,
            'id_usuario' => 2
        ],
        [
            'producto' => 'Jugo del valle',
            'cantidad' => 1,
            'total' => 0.55,
            'id_usuario' => 4
        ],
        [
            'producto' => 'Jugo petit',
            'cantidad' => 5,
            'total' => 2.50,
            'id_usuario' => 5
        ],
        [
            'producto' => 'Galleta chokis',
            'cantidad' => 1,
            'total' => 0.90,
            'id_usuario' => 3
        ],
        [
            'producto' => 'Dulce halls',
            'cantidad' => 1,
            'total' => 0.50,
            'id_usuario' => 6
        ],
        [
            'producto' => 'Nachos diana',
            'cantidad' => 2,
            'total' => 2.30,
            'id_usuario' => 4
        ],
        [
            'producto' => 'Paleta cinta negra',
            'cantidad' => 4,
            'total' => 2.00,
            'id_usuario' => 1
        ]
    ]);

        return response()->json([
            'Message' => 'Records created Successfully',
            'New users' => $users,
            'New orders' => $pedidos
        ], 201);
    }
}
