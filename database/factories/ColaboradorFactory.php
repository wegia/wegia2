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
            'admissao' => $this->faker->dateTimeBetween('-10 years'),
            'situacao' => $this->faker->randomElement(['A','A','A','A','I']),
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
        ];
    }
}
