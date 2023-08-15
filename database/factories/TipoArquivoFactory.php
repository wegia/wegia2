<?php

namespace Database\Factories;

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

    protected $model = \app\Models\rh\TipoArquivo::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement(['T1', 'T2', 'T3']),
        ];
    }
}
