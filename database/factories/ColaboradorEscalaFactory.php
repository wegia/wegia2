<?php

namespace Database\Factories;

use App\Models\rh\Colaborador;
use App\Models\rh\ColaboradorEscala;
use App\Models\rh\Escala;
use App\Models\rh\TipoEscala;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ColaboradorEscalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ColaboradorEscala::class;

    public function definition(): array
    {
        $existingColaboradorIds = Colaborador::pluck('id')->toArray();
        $existingEscalaIds = Escala::pluck('id')->toArray();
        $existingTipoEscalaIds = TipoEscala::pluck('id')->toArray();

        return [
            'colaborador_id' => $this->faker->randomElement($existingColaboradorIds),
            'escala_id' => $this->faker->randomElement($existingEscalaIds),
            'tipo_escala_id' => $this->faker->randomElement($existingTipoEscalaIds),
            'inicio' => $this->faker->dateTimeBetween('-3 years', '-2 years'),
            'fim' => $this->faker->dateTimeBetween('-1 years')
        ];
    }
}
