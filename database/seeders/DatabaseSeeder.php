<?php

use App\Models\rh\TipoEscala;
use App\Models\utils\Parentesco;
use App\Models\rh\Cargo;
use Database\Seeders\CargoSeeder;
use Database\Seeders\EscalaSeeder;
use Database\Seeders\ParentescoSeeder;
use Database\Seeders\PessoaTableSeeder;
use Database\Seeders\TipoArquivoSeeder;
use Database\Seeders\TipoEscalaSeeder;
use Database\Seeders\TipoRemuneracaoSeeder;
use Database\Seeders\UFSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //PessoaTableSeeder::class,
            //TipoArquivoSeeder::class,
            //EscalaSeeder::class,
            //TipoEscalaSeeder::class
            //TipoRemuneracaoSeeder::class,
            //UFSeeder::class,
            //ParentescoSeeder::class,
            CargoSeeder::class,
        ]);
    }
}
