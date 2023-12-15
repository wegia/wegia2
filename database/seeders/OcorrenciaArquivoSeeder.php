<?php

namespace Database\Seeders;

use App\Models\pessoa\OcorrenciaArquivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OcorrenciaArquivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OcorrenciaArquivo::factory()->count(10)->create();
    }
}
