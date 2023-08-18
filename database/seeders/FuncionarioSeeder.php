<?php

namespace Database\Seeders;
use App\Models\rh\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Funcionario::factory()->count(10)->create();
    }
}
