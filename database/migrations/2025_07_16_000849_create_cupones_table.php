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
Schema::create('cupones', function (Blueprint $table) {
    $table->id();
    $table->string('codigo')->unique();
    $table->unsignedBigInteger('campania_id')->nullable();
    $table->foreign('campania_id')->references('id')->on('campanias')->nullOnDelete();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupones');
    }
};
