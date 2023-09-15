<?php

namespace Database\Factories;

use App\Models\pessoa\TipoAtendido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TipoAtendidoFactory extends Factory
{
    protected $model = TipoAtendido::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "descricao" => "Interno",
        ];
    }
}
