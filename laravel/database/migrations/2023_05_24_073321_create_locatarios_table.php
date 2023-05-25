<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Por algum motivo ao rodar 'php artisan migrate' os campos de nome, email e telefone não foram criados na tabela.
     * talvez por ser um Ctrl+V da tabela locadores, Mudei isto manualmente no banco de dados.
     */
    public function up(): void
    {
        Schema::create('locatarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locatarios');
    }
};
