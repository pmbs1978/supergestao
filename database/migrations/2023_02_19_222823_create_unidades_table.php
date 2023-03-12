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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 100);
            $table->timestamps();
        });

        // adicionar relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            // constrains
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        Schema::table('produtos_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');

            // constrains
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //primeiro temos de remover as ligações
        Schema::table('produtos', function (Blueprint $table) {
            // remover a foreign key primeiro
            // o laravel cria o nome da foreign key da seguinte maneira
            // nomeDaTabela_nomeDaColuna_foreign
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::table('produtos_detalhes', function (Blueprint $table) {
            // remover a foreign key primeiro
            // o laravel cria o nome da foreign key da seguinte maneira
            // nomeDaTabela_nomeDaColuna_foreign
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        // só no fim podemos remover a tabela
        Schema::dropIfExists('unidades');
    }
};
