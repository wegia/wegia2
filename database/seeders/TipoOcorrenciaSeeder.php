<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoOcorrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_ocorrencia')->insert(['nome' => 'Acolhimento',]);
        DB::table('tipo_ocorrencia')->insert(['nome' => 'Falecimento',]);
    }
}
