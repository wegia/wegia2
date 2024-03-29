<?php

namespace Database\Factories;

use App\Models\pessoa\TipoEscala;
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

    protected $model = TipoEscala::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement(['Segunda à Sexta, folga Sábado e Domingo','Dias Alternados']),
        ];
    }
}
