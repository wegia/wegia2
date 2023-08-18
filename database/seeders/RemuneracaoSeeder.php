<?php

namespace Database\Seeders;

use App\Models\rh\Remuneracao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemuneracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Remuneracao::factory()->count(30)->create();
    }
}
