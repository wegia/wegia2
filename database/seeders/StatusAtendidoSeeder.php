<?php

namespace Database\Seeders;

use App\Models\pessoa\StatusAtendido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusAtendidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusAtendido::factory()->count(1)->create();
    }
}
