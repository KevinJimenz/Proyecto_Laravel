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
        Schema::create('prisioneros', function (Blueprint $table) {
            $table->id(); // ID único del prisionero
            $table->string('nombre_completo'); // Nombre completo del prisionero
            $table->date('fecha_nacimiento'); // Fecha de nacimiento
            $table->date('fecha_ingreso'); // Fecha de ingreso a la prisión
            $table->string('delito_cometido'); // Delito cometido
            $table->string('celda_asignada'); // Celda asignada
            $table->timestamps(); // Timestamps para las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prisioneros');
    }
};
