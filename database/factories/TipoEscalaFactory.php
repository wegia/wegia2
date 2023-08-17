<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TipoEscalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \app\Models\rh\TipoEscala::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement(['TE1', 'TE2', 'TE3','TE4','TE5']),
        ];
    }
}
