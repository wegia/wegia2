<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\pessoa\Atendido;
use App\Models\pessoa\Familiar;
use App\Models\pessoa\utils\Parentesco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FamiliarFactory extends Factory
{
    protected $model = Familiar::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingPessoaIds = Pessoa::pluck('id')->toArray();
        $existingAtendidoIds = Atendido::pluck('id')->toArray();
        $existingParentescoIds = Parentesco::pluck('id')->toArray();
        return [
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
            'atendido_id' => $this->faker->randomElement($existingAtendidoIds),
            'parentesco_id' => $this->faker->randomElement($existingParentescoIds),
        ];
    }
}
