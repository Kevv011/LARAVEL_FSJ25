<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string("producto");                   //Campo Producto de tipo STRING
            $table->integer("cantidad");                  //Campo Cantidad de tipo INT
            $table->float("total");                       //Campo Total de tipo FLOAT
            $table->foreignId("user_id")->constrained();  //FK de tabla Users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
