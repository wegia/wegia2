<?php

namespace Database\Factories;

use App\Models\rh\Cargo;
use App\Models\rh\CargoColaborador;
use App\Models\rh\Colaborador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CargoColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CargoColaborador::class;

    public function definition(): array
    {
        $existingColaboradorIds = Colaborador::pluck('id')->toArray();
        $existingCargoIds = Cargo::pluck('id')->toArray();

        return [
            'colaborador_id' => $this->faker->randomElement($existingColaboradorIds),
            'cargo_id' => $this->faker->randomElement($existingCargoIds),
            'inicio' => $this->faker->dateTimeBetween('-10 years', '-5 years'),
            'fim' => $this->faker->dateTimeBetween('-4 years'),
            'e_cargo_atual' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
