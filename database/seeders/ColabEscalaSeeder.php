<?php

namespace Database\Seeders;

use App\Models\rh\ColabEscala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColabEscalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColabEscala::factory()->count(10)->create();

    }
}
