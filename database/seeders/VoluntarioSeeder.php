<?php

namespace Database\Seeders;

use App\Models\pessoa\Voluntario;
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
