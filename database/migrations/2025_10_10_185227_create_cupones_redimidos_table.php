<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cupones_redimidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario')->nullable(); // Relación con tabla users
            $table->unsignedBigInteger('userId')->nullable();     // ID del usuario dentro de otro sistema (opcional)
            $table->unsignedBigInteger('couponId')->nullable();   // ID del cupón
            $table->unsignedBigInteger('comercioId')->nullable(); // ID del comercio donde se redime

            $table->timestamps();

            // Relaciones opcionales (puedes descomentar si existen esas tablas)
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('couponId')->references('id')->on('cupones');
            // $table->foreign('comercioId')->references('id')->on('comercios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cupones_redimidos');
    }
};
