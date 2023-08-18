<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \app\Models\rh\Horario::class;

    public function definition(): array
    {
        $existingColaboradorIds = \App\Models\rh\Colaborador::pluck('id')->toArray();

        return [
            'colab_id' => $this->faker->randomElement($existingColaboradorIds),
            'entrada' => $this->faker->time(),
            'saida' => $this->faker->time(),
            'inicio' => $this->faker->dateTimeInInterval('-2 week'),
            'fim' => $this->faker->dateTimeInInterval('-1 week'),
            'dia_semana' => $this->faker->randomElement(['seg', 'ter', 'qua', 'qui', 'sex', 
            'sab', 'dom']),
        ];
    }
}
