<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\rh\Arquivo;
use App\Models\rh\TipoArquivo;
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

    protected $model = Arquivo::class;

    public function definition(): array
    {
        $existingPessoaIds = Pessoa::pluck('id')->toArray();
        $existingTipoArquivoIds = TipoArquivo::pluck('id')->toArray();

        return [
            'pessoa_id' => $this->faker->randomElement($existingPessoaIds),
            'tipo_arquivo_id' => $this->faker->randomElement($existingTipoArquivoIds),
            'binario_arquivo' => $this->faker->imageUrl(),
            'descricao' => $this->faker->sentence(2),
            'data_cadastro' => $this->faker->date(),
        ];
    }
}
