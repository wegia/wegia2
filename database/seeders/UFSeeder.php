<?php

namespace Database\Seeders;

use App\Models\utils\Uf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Uf::truncate();

        $brUF = [
            ["nome" => "Acre", "sigla" => "AC"],
            ["nome" => "Alagoas", "sigla" => "AL"],
            ["nome" => "Amapá", "sigla" => "AP"],
            ["nome" => "Amazonas", "sigla" => "AM"],
            ["nome" => "Bahia", "sigla" => "BA"],
            ["nome" => "Ceará", "sigla" => "CE"],
            ["nome" => "Distrito Federal", "sigla" => "DF"],
            ["nome" => "Espírito Santo", "sigla" => "ES"],
            ["nome" => "Goiás", "sigla" => "GO"],
            ["nome" => "Maranhão", "sigla" => "MA"],
            ["nome" => "Mato Grosso", "sigla" => "MT"],
            ["nome" => "Mato Grosso do Sul", "sigla" => "MS"],
            ["nome" => "Minas Gerais", "sigla" => "MG"],
            ["nome" => "Pará", "sigla" => "PA"],
            ["nome" => "Paraíba", "sigla" => "PB"],
            ["nome" => "Paraná", "sigla" => "PR"],
            ["nome" => "Pernambuco", "sigla" => "PE"],
            ["nome" => "Piauí", "sigla" => "PI"],
            ["nome" => "Rio de Janeiro", "sigla" => "RJ"],
            ["nome" => "Rio Grande do Norte", "sigla" => "RN"],
            ["nome" => "Rio grande do Sul", "sigla" => "RS"],
            ["nome" => "Rondônia", "sigla" => "RO"],
            ["nome" => "Roraima", "sigla" => "RR"],
            ["nome" => "Santa Catarina", "sigla" => "SC"],
            ["nome" => "São Paulo", "sigla" => "SP"],
            ["nome" => "Sergipe", "sigla" => "SE"],
            ["nome" => "Tocantins", "sigla" => "TO"],
        ];

        foreach ($brUF as $key => $uf) {
            uf::create($uf);
        }
    }
}
