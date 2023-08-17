<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArquivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \app\Models\rh\Arquivo::class;

    public function definition(): array
    {
        $existingPessoaIds = \App\Models\Pessoa::pluck('id')->toArray();
        $existingTipoArquivoIds = \App\Models\rh\TipoArquivo::pluck('id')->toArray();

        return [
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
            'tipo_id' => $this->faker->randomElement($existingTipoArquivoIds),
            'foto' => $this->faker->imageUrl(),
            'descricao' => $this->faker->sentence(2),
            'data_cadastro' => $this->faker->date(),
        ];
    }
}
