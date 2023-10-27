<?php

namespace Database\Factories;

use App\Models\pessoa\Atendido;
use App\Models\pessoa\Ocorrencia;
use App\Models\pessoa\TipoOcorrencia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OcorrenciaFactory extends Factory
{
    protected $model = Ocorrencia::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingAtendidoIds = Atendido::pluck('id')->toArray();
        $existingTipoOcorrenciaIds = TipoOcorrencia::pluck('id')->toArray();
        return [
            'atendido_id' => $this->faker->randomElement($existingAtendidoIds),
            'tipo_ocorrencia_id' => $this->faker->randomElement($existingTipoOcorrenciaIds),
            'data' => $this->faker->date(),
            'descricao' => $this->faker->sentence(2),
            'arquivo' => $this->faker->imageUrl(),
        ];
    }
}
