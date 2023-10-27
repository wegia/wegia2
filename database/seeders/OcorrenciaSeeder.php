<?php

namespace Database\Seeders;

use App\Models\pessoa\Ocorrencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OcorrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ocorrencia::factory()->count(5)->create();
    }
}
