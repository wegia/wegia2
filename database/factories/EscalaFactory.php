<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EscalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \app\Models\rh\Escala::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement(['5X2 - 5 dias trabalhados com 2 dias de folga', '12x36 - 12 horas trabalhadas com 36 horas de folga']),
            'descricao'=> $this->faker->sentence(),
        ];
    }
}
