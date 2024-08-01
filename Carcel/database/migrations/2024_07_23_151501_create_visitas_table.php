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
        Schema::create('visitas', function (Blueprint $table) {
            $table->id(); // ID único de la visita
            $table->foreignId('prisionero_id')->constrained('prisioneros')->onDelete('cascade'); // Clave foránea al prisionero
            $table->foreignId('visitante_id')->constrained('visitantes')->onDelete('cascade'); // Clave foránea al visitante
            $table->dateTime('fecha_hora_inicio'); // Fecha y hora de inicio de la visita
            $table->dateTime('fecha_hora_fin'); // Fecha y hora de fin de la visita
            $table->foreignId('guardia_id')->constrained('users')->onDelete('cascade'); // Define la clave foránea
            $table->timestamps(); // Timestamps para las fechas de creación y actualización

  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
