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
        // criando coluna motivo_contactos_id
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->unsignedbigInteger('motivo_contactos_id'); // A chave estrangeira tem de ter o mesmo tipo de dados da chave primária
        });

        // copiando a coluna motivo_contactos para a nova coluna
        DB::statement('update site_contactos set motivo_contactos_id = motivo_contacto');

        // criando a relação entre tabelas e removendo a coluna motivo_contacto
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->foreign('motivo_contactos_id')->references('id')->on('motivo_contactos');
            $table->dropColumn('motivo_contacto');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->integer('motivo_contacto');
        });

        DB::statement('update site_contactos set motivo_contacto = motivo_contactos_id');

        Schema::table('site_contactos', function (Blueprint $table) {
            // padrão laravel para nomear cheves estrangeiras: (nome da tabela)_(nome da coluna)_(foregein)
            $table->dropForeign('site_contactos_motivo_contactos_id_foreign');
            $table->dropColumn('motivo_contactos_id');
        });



    }
};
