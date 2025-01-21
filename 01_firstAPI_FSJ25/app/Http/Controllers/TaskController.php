<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    //Usado para recoger todos los datos de la tabla Task (Simula un SELECT * FROM Tasks)
    public function index()
    {
        $tasks = Task::all();     
        return response()->json([ //Para devolver los datos, comunmente se devuelve en JSON en un array de 'data'
            'data' => $tasks
        ]);
    }

    //Crea una nueva tarea e inserta los datos que han sido obtenidos en index().  --> CREATE simula el INSERT INTO de SQL)
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json([
            'message' => 'Task created Succesfully',
            'data' => $task
        ], 201);
    }

    //Metodo para obtener el id para un UPDATE
    public function update(Request $request, string $id) 
    {
        //Buscar la tarea por id
        $task = Task::findOrFail($id);

        //Actualizar la tarea
        $task->update($request->all());

        //Respuesta ante el UPDATE exitoso
        return response()->json([
            'message' => 'Task updated Succesfully',
            'data' => $task
        ]);
    }
    
    //Metodo para obtener el id para un DELETE
    public function destroy(string $id) 
    {
        //Buscar la tarea por el id
        $task = Task::findOrFail($id);

        //Eliminar la tarea
        $task->delete();

        //Respuesta ante un DELETE exitoso
        return response()->json([
            'message' => 'Task deleted succesfully'
        ]);
    }
}
