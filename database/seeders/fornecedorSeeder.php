<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class fornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();

        // 1º método
        // instanciando o objecto
        $fornecedor->nome = 'Pedro Santos';
        $fornecedor->site = 'pmbs.tk';
        $fornecedor->uf = 'sa';
        $fornecedor->email = 'pedro.miguel.bs@gmail.com';
        $fornecedor->save();

        // 2º método
        // usando o método create da class (atenção ao atributo fillable da classe)
        Fornecedor::create(
            [
                'nome' => 'Pedro Miguel',
                'site' => 'pmbs.ml',
                'uf' => 'sa',
                'email' => 'pmbs.cloud.dev@gmail.com'
            ]
        );

        // 3º método
        // usando insert
        //         That's because Laravel will look for DB class in the current namespace which is Database\Seeders.

        // Since Laravel has facades defined in config/app.php which allows you to use those classes without full class name.

        //     'DB' => Illuminate\Support\Facades\DB::class,
        // You can either declare DB class after the namespace declaration with

        // use DB;
        // or just use it with backslash.

        //     \DB::table('users')->insert([

        \DB::table('fornecedores')->insert(
            [
                'nome' => 'Pedro Barriga',
                'site' => 'pmbs.tk',
                'uf' => 'sa',
                'email' => 'pmbs.@gmail.com'
            ]
        );

        // 4º método
        // usando insert
        \DB::insert('insert into fornecedores (nome, site, uf, email) values ("Pedro", "pmbs", "sa", "pedro@gmail.com")');
    }
}
