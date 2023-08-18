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
            'nome' => $this->faker->unique()->randomElement(['Carteira de Identidade', 'Carteira de Motorista', 'Carteira do SUS','Certidão de Casamento','Certidão de Nascimento','Certificado de Reservista','Comprovante de Escolaridade','Comprovante de Residência','CPF','CTPS','Exame Admissional','PIS/PASEP','Registro Profissional','Título de Eleitor']),
        ];
    }
}
