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
        Schema::create('catfechasvacunas', function (Blueprint $table) {
            $table->string('ecodfechas');
            $table->date('fhvacunacion');
            $table->string('ecodEstatus',50);
            $table->integer('ecodMunicipio')->default(0);
            $table->string('Modulo',50);
            $table->string('Direccion',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catfechasvacunas');
    }
};
