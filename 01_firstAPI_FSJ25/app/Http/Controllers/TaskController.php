<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();     //Usado para recoger todos los datos de la tabla Task (Simula un SELECT * FROM Tasks)
        return response()->json([ //Para devolver los datos, comunmente se devuelve en JSON en un array de 'data'
            'data' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all()); //Crea una nueva tarea e inserta los datos que han sido obtenidos en index().  --> CREATE simula el INSERT INTO de SQL)
        return response()->json([
            'message' => 'Task created Succesfully',
            'data' => $task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
