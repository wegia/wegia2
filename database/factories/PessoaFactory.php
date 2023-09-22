<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake('pt_BR')->name(),
            'genero' => fake()->randomElement(['M','F','O']),
            'nascimento' => fake()->date(),
            'cpf' => $this->faker->numerify('###########'),
            'foto' => fake()->imageUrl(),
            'rg' => $this->faker->numerify('#######'),
            'rg_orgao' => $this->faker->randomElement(['DETRAN','SSP','DIC']),
            'rg_data_expedicao' =>  $this->faker->dateTimeBetween('-10 years'),
            'rg_data_vencimento' => $this->faker->dateTimeBetween('now','10 years'),
            'nome_mae' => fake('pt_BR')->name('male'),
            'nome_pai' =>  fake('pt_BR')->name('female'),
            'tipo_sangue' => fake()->randomElement(['A+','B+','AB+','O+','A-','B-','AB-','O-']),
        ];
    }
}
