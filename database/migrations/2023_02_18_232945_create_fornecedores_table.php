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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
            // $table->softDeletes(); criada mais tarde
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
        // Schema::drop('fornecedores');

        // para executar utelizar o comando na linha de comandos
        // php artisan migrate:rollback  (volta um passo para trás)
        // php artisan migrate:rollback --step=nº de passos a voltar
    }
};
