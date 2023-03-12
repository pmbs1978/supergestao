<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\MotivoContacto;

class MotivoContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MotivoContacto::create([
            'motivo_contacto' => 'Dúvida'
        ]);

        MotivoContacto::create([
            'motivo_contacto' => 'Elogio'
        ]);

        MotivoContacto::create([
            'motivo_contacto' => 'Reclamação'
        ]);
    }
}
