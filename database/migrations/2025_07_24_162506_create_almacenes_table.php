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
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->decimal('lat', 10, 7)->nullable(); // Campo latitud
            $table->decimal('lng', 10, 7)->nullable(); // Campo longitud
            $table->string('logo')->nullable();        // Campo logo
            $table->foreignId('categoria_almacen_id')  // Relación con categoría
                  ->nullable()
                  ->constrained('categoria_almacen')
                  ->nullOnDelete(); // Si se borra la categoría, queda NULL
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacenes');
    }
};
