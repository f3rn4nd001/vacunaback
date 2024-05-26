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
        Schema::create('catusuario', function (Blueprint $table) {
            $table->string('ecodUsuario',50);
            $table->string('tCURP',19);
            $table->string('tNombre',19);
            $table->string('tPrimerApellido',19);
            $table->string('tSegundoApellido',19)->nullable();
            $table->date('fhNacimiento');
            $table->string('nEdad',4);
            $table->string('tToken',500)->nullable();
            $table->string('ecodEstatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catusuario');
    }
};
