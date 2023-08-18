<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ColabEscalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \app\Models\rh\ColabEscala::class;

    public function definition(): array
    {
        $existingColaboradorIds = \App\Models\rh\Colaborador::pluck('id')->toArray();
        $existingEscalaIds = \App\Models\rh\Escala::pluck('id')->toArray();
        $existingTipoEscalaIds = \App\Models\rh\TipoEscala::pluck('id')->toArray();

        return [
            'colab_id' => $this->faker->randomElement($existingColaboradorIds),
            'escala_id' => $this->faker->randomElement($existingEscalaIds),
            'tipo_id' => $this->faker->randomElement($existingTipoEscalaIds),
            'inicio' => $this->faker->dateTimeBetween('-3 years', '-2 years'),
            'fim' => $this->faker->dateTimeBetween('-1 years')
        ];
    }
}
