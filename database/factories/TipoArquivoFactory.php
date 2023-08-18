<?php

namespace Database\Factories;

use App\Models\rh\TipoArquivo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsrhTipoArquivo>
 */
class TipoArquivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = TipoArquivo::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement(['TA1', 'TA2', 'TA3']),
        ];
    }
}
