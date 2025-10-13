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
    Schema::create('campanias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->integer('descuento_porcentaje');
        $table->decimal('compra_minima', 10, 2);
        $table->decimal('compra_maxima', 10, 2)->nullable();
        $table->dateTime('fecha_caducidad');
        $table->integer('cantidad_maxima');
$table->foreignId('id_tipo_cliente')->nullable()->constrained('tipo_clientes')->nullOnDelete();
        $table->boolean('activo')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campanias');
    }
};
