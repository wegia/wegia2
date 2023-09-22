<?php

namespace Database\Seeders;

use App\Models\pessoa\Familiar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Familiar::factory()->count(2)->create();
    }
}
