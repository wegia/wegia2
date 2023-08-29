<?php

namespace Tests\Unit;

use App\Models\rh\ColabEscala;
use App\Models\rh\Colaborador;
use App\Models\rh\Escala;
use App\Models\rh\TipoEscala;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\TestCase;

class TipoEscalaTest extends TestCase
{
    /**@test */
    public function tipo_escala_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumn('tipo_escala',['id', 'nome'])
        );
    }

    /**@test */
    public function test_tipo_escala_relationships()
    {
        // $escala = Escala::factory()->create();
        $tipoEscala = TipoEscala::factory()->create();
        // $colaborador = Colaborador::factory()->create();
        // $colabEscala = ColabEscala::factory()->create(['escala_id' => $escala->id, 'tipo_escala_id' => $tipoEscala-> id, 'colaborador_id' => $colaborador->id]);
        $this->assertInstanceOf(ColabEscala::class, $tipoEscala->colabEscalas);

    }
}
