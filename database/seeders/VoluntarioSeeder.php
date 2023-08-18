<?php

namespace Database\Seeders;

use App\Models\rh\Voluntario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoluntarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voluntario::factory()->count(10)->create();
    }
}
