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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });

        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('pedido_produtos', function (Blueprint $table) {
        //     $table->dropForeign('pedido_produtos_pedido_id_foreign');
        //     $table->dropForeign('pedido_produtos_produto_id_foreign');
        // });

        // Schema::dropIfExists('pedido_produtos');

        // Schema::table('pedidos', function (Blueprint $table) {
        //     $table->dropForeign('pedidos_cliente_id_foreign');
        // });

        // Schema::dropIfExists('pedidos');

        // Schema::dropIfExists('clientes');

        schema::disableForeignKeyConstraints();

        Schema::dropIfExists('pedido_produtos');

        Schema::dropIfExists('pedidos');

        Schema::dropIfExists('clientes');

        schema::enableForeignKeyConstraints();
    }
};
