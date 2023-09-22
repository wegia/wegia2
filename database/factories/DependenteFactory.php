<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\pessoa\Dependente;
use App\Models\pessoa\Funcionario;
use App\Models\pessoa\utils\Parentesco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class DependenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Dependente::class;

    public function definition(): array
    {
        $existingFuncionarioIds = Funcionario::pluck('id')->toArray();
        $existingPessoaIds = Pessoa::pluck('id')->toArray();
        $existingParentescoIds = Parentesco::pluck('id')->toArray();


        return [
            'funcionario_id' => $this->faker->randomElement($existingFuncionarioIds),
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
            'parentesco_id' => $this->faker->randomElement($existingParentescoIds),
        ];
    }
}
