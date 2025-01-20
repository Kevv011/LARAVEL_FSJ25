<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Columnas de la tabla que se pueden modificar (Se especifican para llenarse de forma masiva y seran las unicas a usar)
    protected $fillable = ['name', 'description', 'completed'];
}
