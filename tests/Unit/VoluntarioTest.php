<?php

namespace Tests\Unit;

use App\Models\Pessoa;
use App\Models\pessoa\Voluntario;
use App\Models\pessoa\Colaborador;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class VoluntarioTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test  */
    public function voluntario_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('voluntario', [
                'id','colaborador_id', 'disponib_semana', 'disponib_horas', 'descricao'
            ])
        );
    }

    /** @test */
    public function test_voluntario_relationships()
    {
        $pessoa = Pessoa::factory()->create();
        $colaborador = Colaborador::factory()->create(['pessoa_id' => $pessoa->id]);
        $voluntario = Voluntario::factory()->create(['colaborador_id' => $colaborador->id]);

        $this->assertInstanceOf(Colaborador::class, $voluntario->colaborador);
    }
}
