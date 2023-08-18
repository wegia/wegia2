<?php

namespace Database\Seeders;

use App\Models\rh\ColabCargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColabCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColabCargo::factory()->count(10)->create();
    }
}
