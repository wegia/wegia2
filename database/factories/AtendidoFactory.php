<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\pessoa\Atendido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AtendidoFactory extends Factory
{
    protected $model = Atendido::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingPessoaIds = Pessoa::pluck('id')->toArray();
        return [
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
            'tipo_atendido_id' => '1',
            'status_atendido_id' => '1',
        ];
    }
}
