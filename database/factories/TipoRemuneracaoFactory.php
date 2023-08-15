<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TipoRemuneracaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \app\Models\rh\TipoRemuneracao::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement(['TE1', 'TE2', 'TE3']),
        ];
    }
}
