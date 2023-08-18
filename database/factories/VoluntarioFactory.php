<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VoluntarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \app\Models\rh\Voluntario::class;

    public function definition(): array
    {
        $selectedDays = $this->faker->randomElements(['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'], $count = rand(1, 7));
        $disponib_semana = implode(', ', $selectedDays);

    return [
        'colab_id' => $this->faker->unique()->numberBetween(11, 20),
        'disponib_semana' => $disponib_semana,
        'disponib_horas' => $this->faker->numberBetween(1, 9) . ':00',
        'descricao' => $this->faker->sentence(),
    ];
    }
}
