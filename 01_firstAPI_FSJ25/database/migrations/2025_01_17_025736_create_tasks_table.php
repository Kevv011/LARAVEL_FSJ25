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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);                  //Tipo de dato VARCHAR SQL: name VARCHAR(100);
            $table->text('description');                  //Tipo de dato TEXT SQL   : description TEXT;
            $table->boolean('completed')->default(false); //Tipo de dato BOOLEAN    : completed BOOL DEFAULT FALSE;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
