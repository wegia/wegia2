<?php

namespace Database\Seeders;

use App\Models\utils\Parentesco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Parentesco::truncate();

        $parentesco = [
            ["nome"=>"Pai"],
            ["nome"=>"Mãe"],
            ["nome"=>"Filho"],
            ["nome"=>"Filha"],
            ["nome"=>"Irmão"],
            ["nome"=>"Irmã"],
            ["nome"=>"Primo"],
            ["nome"=>"Prima"],
            ["nome"=>"Tio"],
            ["nome"=>"Tia"],
            ["nome"=>"Côjuge"],
            ["nome"=>"Cunhado"],
            ["nome"=>"Cunhada"],
            ["nome"=>"Genro"],
            ["nome"=>"Nora"],
            ["nome"=>"Sogro"],
            ["nome"=>"Sogra"],
            ["nome"=>"Genro"],
            ["nome"=>"Nora"],
            ["nome"=>"Sobrinho"],
            ["nome"=>"Sobrinha"],
            ["nome"=>"Outro"],
    ];

        foreach ($parentesco as $key => $pa) {
            Parentesco::create($pa);
        }

    }
}
