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
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_locador');
            $table->string('cep');
            $table->string('descricao_caracteristicas');
            $table->integer('valor_diaria');
            $table->integer('quantidade_maxima_pessoas');
            $table->integer('quantidade_minima_dias');
            $table->timestamps();


            $table->foreign('id_locador')->references('id')->on('locadores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imoveis');
    }
};
