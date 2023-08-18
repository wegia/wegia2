<?php

use App\Models\Pessoa;
use App\Models\rh\TipoEscala;
use App\Models\rh\Contato;
use App\Models\rh\Cargo;
use App\Models\rh\Escala;
use App\Models\rh\Arquivo;
use App\Models\rh\TipoArquivo;
use App\Models\rh\TipoRemuneracao;
use App\Models\rh\Colaborador;
use App\Models\rh\Dependente;
use App\Models\rh\Horario;
use App\Models\rh\Funcionario;
use App\Models\rh\Voluntario;
use Database\Seeders\CargoSeeder;
use Database\Seeders\ColaboradorSeeder;
use Database\Seeders\ContatoSeeder;
use Database\Seeders\EscalaSeeder;
use Database\Seeders\ParentescoSeeder;
use Database\Seeders\PessoaTableSeeder;
use Database\Seeders\TipoArquivoSeeder;
use Database\Seeders\ArquivoSeeder;
use Database\Seeders\DependenteSeeder;
use Database\Seeders\FuncionarioSeeder;
use Database\Seeders\TipoEscalaSeeder;
use Database\Seeders\TipoRemuneracaoSeeder;
use Database\Seeders\HorarioSeeder;
use Database\Seeders\UFSeeder;
use Database\Seeders\VoluntarioSeeder;
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
        Schema::disableForeignKeyConstraints();
            Pessoa::truncate();
            TipoArquivo::truncate();
            Escala::truncate();
            TipoEscala::truncate();
            TipoRemuneracao::truncate();
            Cargo::truncate();
            Contato::truncate();
            Arquivo::truncate();
            Colaborador::truncate();
            Horario::truncate();
            Funcionario::truncate();
            Voluntario::truncate();
            Dependente::truncate();
        Schema::enableForeignKeyConstraints();

        $this->call([
            PessoaTableSeeder::class,
            TipoArquivoSeeder::class,
            EscalaSeeder::class,
            TipoEscalaSeeder::class,
            TipoRemuneracaoSeeder::class,
            UFSeeder::class, //Não é necessário truncar os dados
            ParentescoSeeder::class, //Não é necessário truncar os dados
            CargoSeeder::class,
            ContatoSeeder::class,
            ArquivoSeeder::class,
            ColaboradorSeeder::class,
            HorarioSeeder::class,
            FuncionarioSeeder::class,
            VoluntarioSeeder::class,
            DependenteSeeder::class
        ]);
    }
}
