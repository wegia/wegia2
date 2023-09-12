<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\pessoa\Colaborador;

class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Colaborador::factory()->count(20)->create();
    }
}
