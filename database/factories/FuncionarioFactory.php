<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\pessoa\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Funcionario::class;

    public function definition(): array
    {

        $existingColaboradorIds = Pessoa::pluck('id')->toArray();

        return [
            'colaborador_id' => $this->faker->randomElement($existingColaboradorIds),
            'pis' =>$this->faker->numerify('###########'),
            'ctps'=> $this->faker->numerify('#######/####'),
            'ctps_uf' => $this->faker->stateAbbr(),
            'eleitor_numero'=>$this->faker->numerify('############'),
            'eleitor_zona'=>$this->faker->numerify('###'),
            'eleitor_secao'=>$this->faker->numerify('####'),
            'numero_reservista'=>$this->faker->numerify('############'),
            'orgao_reservista'=>$this->faker->randomLetter(5),
            'serie_reservista'=>$this->faker->randomLetter(5),
        ];
    }
}
