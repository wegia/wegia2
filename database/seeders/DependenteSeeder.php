<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\pessoa\Dependente;

class DependenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dependente::factory()->count(10)->create();
    }
}
