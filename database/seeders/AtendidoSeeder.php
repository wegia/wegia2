<?php

namespace Database\Seeders;

use App\Models\pessoa\Atendido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtendidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atendido::factory()->count(3)->create();
    }
}
