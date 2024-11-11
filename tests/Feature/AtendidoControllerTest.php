<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AtendidoControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Teste para verificar se um CPF válido redireciona para o cadastro de um Atendido.
     */
    public function test_cadastro_atendido_com_cpf_valido()
    {
        // Define um CPF válido
        $cpf = '78307601010';

        // Faz a requisição GET para validar o CPF
        $response = $this->get(route('atendidos.validarCpf', ['cpf' => $cpf]));

        // Verifica se a resposta contém os dados esperados para a página de cadastro
        $response->assertViewIs('pessoa.atendidos.form');
        $response->assertViewHas('cpf', $cpf);
        $response->assertViewHas('cpfJaExiste', false);
        $response->assertViewHas('cpfEvalido', true);
    }
    
}
