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
    Schema::create('campania_almacen', function (Blueprint $table) {
        $table->id();
        $table->foreignId('campania_id')
              ->constrained('campanias')
              ->onDelete('restrict'); // O puedes omitir el onDelete
              
        $table->foreignId('almacen_id')
              ->constrained('almacenes')
              ->onDelete('restrict'); // O puedes omitir el onDelete
              
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campania_almacen');
    }
};
