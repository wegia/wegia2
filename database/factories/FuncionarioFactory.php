<?php

namespace Database\Factories;

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
    protected $model = \app\Models\rh\Funcionario::class;

    public function definition(): array
    {
        return [
            'colab_id' => $this->faker->unique()->numberBetween(1,20),
            'pis' =>$this->faker->numerify('###########'),
            'ctps'=> $this->faker->numerify('#######/####'),
            'ctps_uf' => $this->faker->stateAbbr(),
            'eleitor_numero'=>$this->faker->numerify('############'),
            'eleitor_zona'=>$this->faker->numerify('###'),
            'eleitor_secao'=>$this->faker->numerify('####'),
            'reserv_numero'=>$this->faker->numerify('############'),
            'reserv_orgao'=>$this->faker->randomLetter(5),
            'reserv_serie'=>$this->faker->randomLetter(5),
        ];
    }
}
