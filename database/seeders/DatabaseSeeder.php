<?php

use App\Models\Pessoa;
use App\Models\pessoa\TipoEscala;
use App\Models\pessoa\Contato;
use App\Models\pessoa\Cargo;
use App\Models\pessoa\Escala;
use App\Models\pessoa\Arquivo;
use App\Models\pessoa\Atendido;
use App\Models\pessoa\CargoColaborador;
use App\Models\pessoa\TipoArquivo;
use App\Models\pessoa\TipoRemuneracao;
use App\Models\pessoa\Colaborador;
use App\Models\pessoa\ColaboradorEscala;
use App\Models\pessoa\Dependente;
use App\Models\pessoa\Horario;
use App\Models\pessoa\Funcionario;
use App\Models\pessoa\Remuneracao;
use App\Models\pessoa\StatusAtendido;
use App\Models\pessoa\Voluntario;
use App\Models\pessoa\TipoAtendido;
use Database\Seeders\CargoSeeder;
use Database\Seeders\ColaboradorSeeder;
use Database\Seeders\ContatoSeeder;
use Database\Seeders\EscalaSeeder;
use Database\Seeders\ParentescoSeeder;
use Database\Seeders\PessoaTableSeeder;
use Database\Seeders\TipoArquivoSeeder;
use Database\Seeders\ArquivoSeeder;
use Database\Seeders\AtendidoSeeder;
use Database\Seeders\CargoColaboradorSeeder;
use Database\Seeders\ColaboradorEscalaSeeder;
use Database\Seeders\DependenteSeeder;
use Database\Seeders\FuncionarioSeeder;
use Database\Seeders\TipoEscalaSeeder;
use Database\Seeders\TipoRemuneracaoSeeder;
use Database\Seeders\HorarioSeeder;
use Database\Seeders\RemuneracaoSeeder;
use Database\Seeders\StatusAtendidoSeeder;
use Database\Seeders\TipoAtendidoSeeder;
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
            ColaboradorEscala::truncate();
            Remuneracao::truncate();
            CargoColaborador::truncate();
            TipoAtendido::truncate();
            StatusAtendido::truncate();
            Atendido::truncate();
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
            DependenteSeeder::class,
            ColaboradorEscalaSeeder::class,
            VoluntarioSeeder::class,
            DependenteSeeder::class,
            RemuneracaoSeeder::class,
            ColaboradorEscalaSeeder::class,
            CargoColaboradorSeeder::class,
            TipoAtendidoSeeder::class,
            StatusAtendidoSeeder::class,
            AtendidoSeeder::class
        ]);
    }
}
