<?php

namespace Tests\Unit;

use App\Models\pessoa\Funcionario;
use App\Models\pessoa\Remuneracao;
use App\Models\pessoa\TipoRemuneracao;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
class TipoRemuneracaoTest extends TestCase
{
     /** @test  */
     public function tipo_remuneracao_table_has_expected_columns()
     {
         $this->assertTrue(
             Schema::hasColumns('tipo_remuneracao', [
                 'id','nome'
             ])
         );
     }
     
    /** @test */
     public function tipo_remuneracao_relationship()
     {
        $pessoa = Funcionario::factory()->create();
        $tipoRemuneracao = TipoRemuneracao::factory()->create();
        $remuneracao = Remuneracao::factory()->create(['funcionario_id'=> $pessoa->id,'tipo_remuneracao_id' => $tipoRemuneracao-> id]);
        $this->assertInstanceOf(Remuneracao::class, $tipoRemuneracao->remuneracaoes->first());
     }
}
