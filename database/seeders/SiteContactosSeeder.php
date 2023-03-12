<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\SiteContacto;

class SiteContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        // $siteContacto = new SiteContacto();
        // $siteContacto->nome = 'pmbs';
        // $siteContacto->telefone = '646464';
        // $siteContacto->email = 'pmbs@gmail.com';
        // $siteContacto->motivo_contacto = '1';
        // $siteContacto->mensagem = 'outra mensagem de teste';
        // $siteContacto->save();

        // SiteContacto::create(
        //     [
        //         'nome' => 'Pedro',
        //         'telefone' => '12457777',
        //         'email' => 'pedro@gmail.com',
        //         'motivo_contacto' => '2',
        //         'mensagem' => 'mensagem teste'
        //     ]
        // );

        \App\Models\SiteContacto::factory()->count(50)->create();

    }
}
