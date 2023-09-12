<?php

namespace Database\Seeders;

use App\Models\pessoa\ColaboradorEscala;
use Illuminate\Database\Seeder;

class ColaboradorEscalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColaboradorEscala::factory()->count(10)->create();

    }
}
