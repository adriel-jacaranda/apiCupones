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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_almacen')->nullable()->after('id');
            $table->foreign('id_almacen')
                  ->references('id')
                  ->on('almacenes')
                  ->onDelete('set null'); 
                  // O ->onDelete('cascade') si quieres que se borre el user al borrar el almacen
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_almacen']);
            $table->dropColumn('id_almacen');
        });
    }
};
