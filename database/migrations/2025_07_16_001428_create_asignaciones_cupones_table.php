<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asignaciones_cupones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cupon_id')->constrained('cupones')->nullOnDelete();
            $table->foreignId('user_id')->constrained('users')->nullOnDelete();

            $table->timestamp('fecha_canje')->nullable();

            $table->timestamps();

            $table->unique(['cupon_id', 'user_id']); // Un usuario solo puede canjear un cupón una vez
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignaciones_cupones');
    }
};
