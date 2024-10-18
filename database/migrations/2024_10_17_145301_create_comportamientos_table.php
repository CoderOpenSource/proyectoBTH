<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comportamientos', function (Blueprint $table) {
            $table->id(); // Añadimos una columna 'id' autoincremental
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('tipo'); // Por ejemplo: positivo o negativo
            $table->string('profesor'); // Aquí almacenaremos el nombre y la materia del profesor
            $table->foreignId('acta_id')->constrained()->onDelete('cascade'); // Relación con acta
            $table->foreignId('estudiante_id')->constrained()->onDelete('cascade'); // Relación con estudiante
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comportamientos');
    }
};
