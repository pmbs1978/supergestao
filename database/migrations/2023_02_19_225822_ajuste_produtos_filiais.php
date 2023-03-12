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
        // criar tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filial', 30);
            $table->timestamps();
        });

        // criar tabela produtos filiais
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('filial_id');
            $table->float('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->timestamps();
            // constrains
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('filial_id')->references('id')->on('filiais');
        });

        // remover as colunas preco_venda, estoque_minimo e estoque_maximo da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            // $table->dropColumn('preco_venda');
            // $table->dropColumn('estoque_minimo');
            // $table->dropColumn('estoque_maximo');
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produto_filiais', function (Blueprint $table) {
            $table->dropForeign('produto_filiais_produto_id_foreign');
            $table->dropForeign('produto_filiais_filial_id_foreign');
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->float('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
