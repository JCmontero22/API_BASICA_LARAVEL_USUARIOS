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
        Schema::create('usuarios_api_laravel', function (Blueprint $table){
            $table->bigIncrements('id_usuario');
            $table->string('nombre_usuario');
            $table->string('apellido_usuario');
            $table->string('identificacion_usuario');
            $table->string('telefono_usuario');
            $table->string('email_usuario');
            $table->tinyInteger('estado_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_api_laravel');
    }
};
