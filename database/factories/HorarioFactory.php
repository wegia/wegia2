<?php

namespace Database\Factories;

use App\Models\rh\Colaborador;
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
        $idColaborador = Colaborador::pluck('id')->toArray();
        $diasSemana = ['SEG', 'TER', 'QUA','QUI', 'SEX', 'SAB', 'DOM'];
        return [
            'colaborador_id' => $this->faker->randomElement($idColaborador),
            'entrada' => $this->faker->time(),
            'saida' => $this->faker->time(),
            'inicio' => $this->faker->dateTimeInInterval('-2 week'),
            'fim' => $this->faker->dateTimeInInterval('-1 week'),
            'dia_semana' => $this->faker->randomElement($diasSemana),
        ];
    }
}
