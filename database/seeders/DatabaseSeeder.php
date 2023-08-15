<?php

use App\Models\rh\TipoEscala;
use Database\Seeders\EscalaSeeder;
use Database\Seeders\PessoaTableSeeder;
use Database\Seeders\TipoArquivoSeeder;
use Database\Seeders\TipoEscalaSeeder;
use Database\Seeders\TipoRemuneracaoSeeder;
use Illuminate\Database\Seeder;

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
            TipoRemuneracaoSeeder::class,
        ]);
    }
}
