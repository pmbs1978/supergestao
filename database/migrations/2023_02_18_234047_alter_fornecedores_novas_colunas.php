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
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            // apagando coluna a colna
            // $table->dropColumn('uf');
            // $table->dropColumn('email');
            $table->dropColumn(['uf', 'email']); // apagando com um array de colunas

            // para executar utelizar o comando na linha de comandos
            // php artisan migrate:rollback  (volta um passo para trás)
            // php artisan migrate:rollback --step=nº de passos a voltar
        });
    }
};
