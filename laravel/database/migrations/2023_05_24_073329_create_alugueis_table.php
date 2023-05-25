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
        Schema::create('alugueis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_locatario');
            $table->unsignedBigInteger('id_imovel');
            $table->unsignedBigInteger('id_locador');
            $table->string('periodo');
            $table->integer('preco_final');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_locatario')->references('id')->on('locatarios');
            $table->foreign('id_imovel')->references('id')->on('imoveis');
            $table->foreign('id_locador')->references('id_locador')->on('imoveis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alugueis');
    }
};
