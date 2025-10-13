<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre_completo')->nullable()->after('name');
            $table->string('celular')->nullable()->after('nombre_completo');
            $table->string('direccion')->nullable()->after('celular');

            $table->enum('rol', ['admin', 'cliente', 'gestionador'])->default('cliente')->after('direccion');

            $table->string('token_id')->nullable()->after('rol');

            $table->unsignedBigInteger('id_tipo_cliente')->nullable()->after('token_id');
            $table->foreign('id_tipo_cliente')->references('id')->on('tipo_clientes');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_tipo_cliente']);
            $table->dropColumn([
                'nombre_completo',
                'celular',
                'direccion',
                'rol',
                'token_id',
                'id_tipo_cliente',
            ]);
        });
    }
};
