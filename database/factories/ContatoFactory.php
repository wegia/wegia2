<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\rh\Contato;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Contato::class;

    public function definition(): array
    {
        $existingPessoaIds = Pessoa::pluck('id')->toArray();

        return [
            'pessoa_id' => $this->faker->unique()->randomElement($existingPessoaIds),
            'logradouro' => $this->faker->streetName(),
            'numero' => $this->faker->numberBetween(1,150),
            'complemento' => $this->faker->sentence(2),
            'bairro' => $this->faker->streetName(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'cep' => $this->faker->numerify('#####-###'),
            'telefone' => $this->faker->phoneNumber('########'),
            'celular' => $this->faker->phoneNumber('+55(22)9####-####'),
            'email' => $this->faker->email(),
            'codigo_ibge' => $this->faker->numerify('#######'),
        ];
    }
}
