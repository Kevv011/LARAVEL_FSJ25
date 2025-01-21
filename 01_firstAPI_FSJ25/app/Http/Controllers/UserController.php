<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //Funcion para registrar un User
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8'
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            //  "12345678" -> Encryptado seria algo como  "$2y$10$1q2w3e4r5t6y7u8i9o0p1q2w3e4r5t6y7u8i9o0p1q2w3e4r5t6y7u8i9o0p"

            return response()->json([
                'message' => 'User created successfully',
                'data' => $user
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ], 400);
        }
    }

    //Funcion para login de un usuario
    public function login(Request $request) {

        try{
            //Validate de los campos
            $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8'
            ]);

            //Verificando usuario ("Attempt" es usado para validar datos, devolviendo TRUE o FALSE)
            $credentials = $request->only('email', 'password');

            if(!Auth::attempt($credentials)) {
                throw new Exception('Invalid credentials');
            }

            //Obtencion de los datos ingresados 
            $user = $request->user();

            //Crear token
            $token = $user->createToken('auth_token')->plainTextToken;

            //Respuesta si se da exitoso el LOGIN
            return response()->json([
                'message' => 'User logged successfuly',
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer'
            ]);

        }catch(Exception $error){
            return response()->json([
                'error' => $error->getMessage()
            ], 400);
        }
    }
}
