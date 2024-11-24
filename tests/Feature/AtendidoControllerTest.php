<?php

namespace Tests\Feature;

use App\Models\Pessoa;
use App\Models\pessoa\Atendido;
use App\Models\pessoa\StatusAtendido;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AtendidoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

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

    /**
     * Teste para verificar se a filtragem de atendidos por status retorna o resultado esperado
     */
    public function test_filtro_por_status_retorna_resultados_corretos()
    {
        $status = StatusAtendido::factory()->create();
        $atendidosComStatus = Atendido::factory()->count(1)->create([
            'status_atendido_id' => $status->id,
        ]);
        Atendido::factory()->count(2)->create(); // Outros atendidos com status diferente

        $response = $this->get(route('atendidos.filtrar', ['status' => $status->id]));

        $response->assertStatus(200);
        $response->assertViewHas('atendidos', function ($atendidos) use ($atendidosComStatus) {
            return $atendidos->contains($atendidosComStatus->first());
        });
    }

    /**
     * Teste para verificar se a filtragem de atendidos com um status com valor inválido retorna um erro
     */
    public function test_filtro_com_status_invalido_redireciona()
    {
        $response = $this->get(route('atendidos.filtrar', ['status' => 999]));

        $response->assertRedirect(route('atendidos.listar'));
        $response->assertSessionHas('error', 'Status inválido.');
    }

    /**
     * Teste para verificar se a pesquisa com nome do atendido retorna o resultado esperado
     */
    public function test_pesquisa_por_nome_retorna_resultado_correto()
    {
        $pessoa = Pessoa::factory()->create(['nome' => 'João Silva']);
        $atendido = Atendido::factory()->create(['pessoa_id' => $pessoa->id]);
        Atendido::factory(3)->create(); // Outros atendidos

        $response = $this->get(route('atendidos.pesquisar', ['pesquisar' => 'João Silva']));

        $response->assertStatus(200);
        $response->assertViewHas('atendidos', function ($atendidos) use ($atendido) {
            return $atendidos->count() === 1 &&
                $atendidos->contains($atendido);
        });
    }

    /**
     * Teste para verificar se a pesquisa com cpf do atendido retorna o resultado esperado
     */
    public function test_pesquisa_por_cpf_retorna_resultado_correto()
    {
        $pessoa = Pessoa::factory()->create(['cpf' => '123.456.789-10']);
        $atendido = Atendido::factory()->create(['pessoa_id' => $pessoa->id]);
        Atendido::factory(2)->create(); // Outros atendidos

        $response = $this->get(route('atendidos.pesquisar', ['pesquisar' => '123.456.789-10']));

        $response->assertStatus(200);
        $response->assertViewHas('atendidos', function ($atendidos) use ($atendido) {
            return $atendidos->count() === 1 &&
                $atendidos->contains($atendido);
        });
    }

    /**
     * Teste para verificar se a pesquisa com um valor vazio retorna erro
     */
    public function test_pesquisa_com_entrada_vazia_redireciona_com_erro()
    {
        $response = $this->get(route('atendidos.pesquisar', ['pesquisar' => '']));

        $response->assertRedirect(route('atendidos.listar'));
        $response->assertSessionHas('error', 'Digite um nome ou CPF para buscar.');
    }

    /**
     * Teste para verificar se a pesquisa sem correspondencia retorna um valor vazio
     */
    public function test_pesquisa_sem_resultados_retorna_lista_vazia()
    {
        $response = $this->get(route('atendidos.pesquisar', ['pesquisar' => 'Nome que não existe']));

        $response->assertStatus(200);
        $response->assertViewHas('atendidos', function ($atendidos) {
            return $atendidos->isEmpty();
        });
    }
    
}
