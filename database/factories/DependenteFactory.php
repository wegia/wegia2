<?php

namespace Database\Factories;

use App\Models\rh\Dependente;
use App\Models\rh\Funcionario;
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

        return [
            'funcionario_id' => $this->faker->randomElement($existingFuncionarioIds),
            'nome' => $this->faker->name,
            'genero' => $this->faker->randomElement(['M', 'F']),
            'telefone' => $this->faker->phoneNumber('########'),
            'nascimento' => $this->faker->dateTime(),
            'parentesco' => $this->faker->randomElement(['Pai', 'Mãe', 'Filho(a)', 'Cônjuge']),
            'cpf' => $this->faker->numerify('###########'),
            'rg' => $this->faker->numerify('#######'),
            'rg_orgao' => $this->faker->randomElement(['DETRAN','SSP','DIC']),
            'rg_expedicao' =>  $this->faker->dateTimeBetween('-10 years'),
            'rg_vencimento' =>  $this->faker->dateTimeBetween('now','10 years'),
        ];
    }
}
