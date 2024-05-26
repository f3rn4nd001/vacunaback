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
        Schema::create('relusuariofecha', function (Blueprint $table) {
            $table->string('ecodrelusuariofecha',50);
            $table->string('ecodfechas',50);
            $table->string('ecodUsuario',50);
            $table->string('ecodEstatus',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relusuariofecha');
    }
};
