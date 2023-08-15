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
            'nome' => $this->faker->unique()->randomElement(['Escala_01', 'Escala_02', 'Escala_03','Escala_04', 'Escala_05' ]),
            'descricao'=> $this->faker->sentence(),
        ];
    }
}
