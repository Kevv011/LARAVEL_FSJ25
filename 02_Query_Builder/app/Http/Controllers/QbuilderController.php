<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Facada para empezar a usar Query Builder de Laravel

class QbuilderController extends Controller
{
    //Metodo para mostrar todos los datos (Creado para ver correctamente las inserciones)
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
        DB::statement('ALTER TABLE usuarios AUTO_INCREMENT = 1'); //Reinicia el AUTO_INCREMENT a 1 en los usuarios

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
                'nombre' => 'renata cuellar',
                'correo' => 'valentina@example.com',
                'telefono' => '+503 56487541'
            ],
            [
                'nombre' => 'juan perez',
                'correo' => 'kevin@example.com',
                'telefono' => '+503 75489541'
            ],
            [
                'nombre' => 'reynaldo fuentes',
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

        //Se hace un SELECT * FROM usuarios para visualizar que se han ingresado las inserciones y se retorna la respuesta de exito status:201
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
                'usuario_id' => 5
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

        //Al igual que la insercion de usuarios, se hace un SELECT * FROM pedidos y se visualizan los registros insertados
        $pedidos = DB::table('pedidos')->get();

        return response()->json([
            'Message' => 'Records created successfully',
            'Orders' => $pedidos
        ], 201);
    }

    // 2) Recupera todos los pedidos asociados al usuario con ID 2
    public function getUser2()
    {

        $user2 = DB::table('pedidos')
            ->where('usuario_id', 2) //Se especifica con ->where el id a recuperar
            ->get();                 //Se obtienen los registros para lanzar respuesta

        return response()->json([
            'message' => 'Orders from user 2 selected',
            'data' => $user2
        ]);
    }

    // 3) Obtén la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios
    public function detailOrder()
    {

        $detailOrder = DB::table('pedidos')                               //Tabla donde empezara la consulta
            ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id')  //Se hace JOIN con 'usuarios', donde 'usuario_id' de tabla 'pedidos' debe coincidir con 'id' de tabla 'usuarios'
            //ADICIONAL: Obligatorio referencia el campo con el nombre completo de la tabla, por regla de Laravel
            ->select(           //Se hace un SELECT de los campos a aparecer
                'pedidos.*',        //Se selecciona 'todo' de tabla pedidos 
                'usuarios.nombre',   //Seleccion de 'nombre' de usuarios 
                'usuarios.correo'    //Seleccion de 'correo; de usuarios 
            )
            ->get();  //Obtencion de la consulta

        //Retorno de respuesta de exito
        return response()->json([
            'message' => 'Data selected:',
            'data' => $detailOrder
        ]);
    }

    // 4) Recupera todos los pedidos cuyo total esté en el rango de $100 a $250
    public function rangeOrders()
    {

        $range = DB::table('pedidos')
            ->whereBetween('total', [100, 250]) //Laravel usa 'whereBetween' para usar clausula BETWEEN que compara entre rango de numeros
            ->get();

        //Respuesta de exito
        return response()->json([
            'message' => 'Data selected with specific total range',
            'data' => $range
        ]);
    }

    // 5) Encuentra todos los usuarios cuyos nombres comiencen con la letra "R"
    public function user_with_r()
    {

        $userR = DB::table('usuarios')
            ->whereLike('nombre', 'R%', caseSensitive: false) //Laravel posee 'whereLike' para usar clausula LIKE
            ->get();

        //Respuesta de exito
        return response()->json([
            'message' => 'Users sorted succesfully',
            'data' => $userR
        ]);
    }

    // 6) Calcula el total de registros en la tabla de pedidos para el usuario con ID 5
    public function totalUser5()
    {

        $user5 = DB::table('pedidos')
            ->where('usuario_id', 5) //Primero se crea la condicion para contar los pedidos de usuario con ID 5
            ->count();               //Se ejecuta count() para contar reistros que cumplan dicha condicion

        //Respuesta de exito
        return response()->json([
            'message' => 'User 5 total orders sorted succesfully',
            'data' => 'There are ' . $user5 . ' orders with user 5'
        ]);
    }

    // 7) Recupera todos los pedidos junto con la información de los usuarios, ordenándolos de forma descendente según el total del pedido.
    public function descOrders()
    {

        $descOrders = DB::table('pedidos')
            ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id') //Se genera un JOIN con todos los campos de 'usuarios' y 'pedidos'
            ->select('pedidos.*', 'usuarios.*')
            ->orderBy('pedidos.total', 'desc') //Laravel maneja clausula 'orderBy' de SQL especificando columna a ordenar y si es ASC o DESC
            ->get();

        //Respuesta de exito
        return response()->json([
            'message' => 'Orders sorted by descendant order',
            'data' => $descOrders
        ]);
    }

    // 8) Obtén la suma total del campo "total" en la tabla de pedidos
    public function sumTotal()
    {

        $sumTotal = DB::table('pedidos')->sum('total'); //Laravel maneja la suma de campos numericos directamnte con 'sum()' 

        //Respuesta de exito
        return response()->json([
            'Total amount' => 'The total is: $' . $sumTotal
        ]);
    }

    // 9) Encuentra el pedido más económico, junto con el nombre del usuario asociado
    public function minTotal()
    {

        $min = DB::table('pedidos')->min('total');

        $cheapestOrder = DB::table('pedidos')
            ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre')
            ->where('pedidos.total', $min)
            ->get();

        //Respuesta de exito
        return response()->json([
            'message' => 'Cheapest order selected: ',
            'Cheapest order' => $cheapestOrder
        ]);
    }

    // 10) Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario
    public function orders()
    {

        $result = DB::table('pedidos')
            ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id') //Se genera el JOIN entre las dos tablas
            ->select(
                'usuarios.nombre as nombre_usuario',
                'pedidos.producto',
                DB::raw('SUM(pedidos.cantidad) as total_cantidad'), 
                DB::raw('SUM(pedidos.total) as total_pedido')
            )
            ->groupBy('usuarios.id', 'usuarios.nombre', 'pedidos.producto') //Se usa 'groupBy' para agrupar las selecciones de la consulta
            ->get();

        return response()->json([
            'Message' => 'Data selected Succesfully',
            'data' => $result
        ]);
    }
}
