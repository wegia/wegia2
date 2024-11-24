<?php

namespace Database\Factories;

use App\Models\pessoa\StatusAtendido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StatusAtendidoFactory extends Factory
{
    protected $model = StatusAtendido::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "status" => $this->faker->unique()->randomElement(['Ativo', 'Inativo', 'Tercerizado', 'Voluntário']),
        ];
    }
}
