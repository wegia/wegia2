<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\pessoa\Colaborador;
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

    protected $model = Colaborador::class;

    public function definition(): array
    {
        $existingPessoaIds = Pessoa::pluck('id')->toArray();

        return [
            'login' => $this->faker->numerify('#######'),
            'senha' =>$this->faker->numerify('#######'),
            'admissao' => $this->faker->dateTimeBetween('-10 years'),
            'situacao' => $this->faker->randomElement(['A','A','A','A','I']),
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
            'cpf' => $this->faker->numerify('###########'),
            'rg' => $this->faker->numerify('#######'),
            'rg_orgao' => $this->faker->randomElement(['DETRAN','SSP','DIC']),
            'rg_data_expedicao' =>  $this->faker->dateTimeBetween('-10 years'),
            'rg_data_vencimento' => $this->faker->dateTimeBetween('now','10 years'),
        ];
    }
}
