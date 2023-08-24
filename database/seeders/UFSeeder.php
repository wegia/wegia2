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
            ["nome_estado" => "Acre", "sigla" => "AC"],
            ["nome_estado" => "Alagoas", "sigla" => "AL"],
            ["nome_estado" => "Amapá", "sigla" => "AP"],
            ["nome_estado" => "Amazonas", "sigla" => "AM"],
            ["nome_estado" => "Bahia", "sigla" => "BA"],
            ["nome_estado" => "Ceará", "sigla" => "CE"],
            ["nome_estado" => "Distrito Federal", "sigla" => "DF"],
            ["nome_estado" => "Espírito Santo", "sigla" => "ES"],
            ["nome_estado" => "Goiás", "sigla" => "GO"],
            ["nome_estado" => "Maranhão", "sigla" => "MA"],
            ["nome_estado" => "Mato Grosso", "sigla" => "MT"],
            ["nome_estado" => "Mato Grosso do Sul", "sigla" => "MS"],
            ["nome_estado" => "Minas Gerais", "sigla" => "MG"],
            ["nome_estado" => "Pará", "sigla" => "PA"],
            ["nome_estado" => "Paraíba", "sigla" => "PB"],
            ["nome_estado" => "Paraná", "sigla" => "PR"],
            ["nome_estado" => "Pernambuco", "sigla" => "PE"],
            ["nome_estado" => "Piauí", "sigla" => "PI"],
            ["nome_estado" => "Rio de Janeiro", "sigla" => "RJ"],
            ["nome_estado" => "Rio Grande do Norte", "sigla" => "RN"],
            ["nome_estado" => "Rio grande do Sul", "sigla" => "RS"],
            ["nome_estado" => "Rondônia", "sigla" => "RO"],
            ["nome_estado" => "Roraima", "sigla" => "RR"],
            ["nome_estado" => "Santa Catarina", "sigla" => "SC"],
            ["nome_estado" => "São Paulo", "sigla" => "SP"],
            ["nome_estado" => "Sergipe", "sigla" => "SE"],
            ["nome_estado" => "Tocantins", "sigla" => "TO"],
        ];

        foreach ($brUF as $key => $uf) {
            uf::create($uf);
        }
    }
}
