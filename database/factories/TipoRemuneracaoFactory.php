<?php

namespace Database\Factories;

use App\Models\rh\TipoRemuneracao;
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

    protected $model = TipoRemuneracao::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique(true)->randomElement(['TR1', 'TR2', 'TR3']),
        ];
    }
}
