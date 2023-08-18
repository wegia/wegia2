<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ColabCargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \app\Models\rh\ColabCargo::class;

    public function definition(): array
    {
        $existingColaboradorIds = \App\Models\rh\Colaborador::pluck('id')->toArray();
        $existingCargoIds = \App\Models\rh\Cargo::pluck('id')->toArray();

        return [
            'colab_id' => $this->faker->randomElement($existingColaboradorIds),
            'cargo_id' => $this->faker->randomElement($existingCargoIds),
            'inicio' => $this->faker->dateTimeBetween('-10 years', '-5 years'),
            'fim' => $this->faker->dateTimeBetween('-4 years'),
            'e_cargo_atual' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
