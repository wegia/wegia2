<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \app\Models\rh\Cargo::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement([
                'Gerente', 'Coordenador', 'Supervisor', 'Administrador',
                'Analista', 'Assistente', 'Auxiliar', 'Estagiário', 
            ]),
            'descricao' => $this->faker->sentence(2),
        ];
    }
}
