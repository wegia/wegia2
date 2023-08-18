<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RemuneracaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \app\Models\rh\Remuneracao::class;


    public function definition(): array
    {
        $existingRemuneracaoIds = \App\Models\rh\TipoRemuneracao::pluck('id')->toArray();
        $existingFuncionarioIds = \App\Models\rh\Funcionario::pluck('id')->toArray();

        return [
            'valor' => $this->faker->randomFloat(2, 0, 99999.99),
            'inicio' => $this->faker->dateTimeBetween('-5 year', 'now'),
            'fim' => $this->faker->dateTimeBetween('now', '+10 year'),
            'func_id' => $this->faker->randomElement($existingFuncionarioIds),
            'tipo_id' => $this->faker->randomElement($existingRemuneracaoIds),
        ];
    }
}
