<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \app\Models\rh\Colaborador::class;

    public function definition(): array
    {
        $existingPessoaIds = \App\Models\Pessoa::pluck('id')->toArray();

        return [
            'login' => $this->faker->numerify('#######'),
            'senha' =>$this->faker->numerify('#######'),
            'admissao' => $this->faker->dateTimeBetween('-10 years'),
            'situacao' => $this->faker->randomElement(['A','A','A','A','I']),
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
            'cpf' => $this->faker->numerify('###########'),
            'rg' => $this->faker->numerify('#######'),
            'rg_orgao' => $this->faker->randomElement(['DETRAN','SSP','DIC']),
            'rg_expedicao' =>  $this->faker->dateTimeBetween('-10 years'),
            'rg_vencimento' => $this->faker->dateTimeBetween('now','10 years'),
        ];
    }
}
