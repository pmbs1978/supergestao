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
        Schema::table('produtos', function (Blueprint $table) {
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor padrão',
                'site' => 'fornecedorpadrao.com',
                'uf' => 'NS',
                'email' => 'contacto@fornecedorpadrao.com'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('descricao');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });

    }
};
