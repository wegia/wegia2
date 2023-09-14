<?php

namespace Database\Seeders;

use App\Models\pessoa\TipoAtendido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoAtendidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoAtendido::factory()->count(1)->create();
    }
}
