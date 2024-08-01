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
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id(); // ID único del visitante
            $table->string('nombre_completo'); // Nombre completo del visitante
            $table->string('numero_identificacion')->unique(); // Número de identificación único del visitante
            $table->string('relacion_con_prisionero'); // Relación con el prisionero
            $table->timestamps(); // Timestamps para las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitantes');
    }
};
