<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\FuncionarioRepositoryInterface;

use App\Models\pessoa\Funcionario;

class FuncionarioRepository extends AbstractRepository 
                    implements FuncionarioRepositoryInterface {

    protected $model = Funcionario::class;

    /**
     * Para carregar o catálogo de funcionários, basta passar:
     *  - funcionario.id
     *  - pessoa.nome
     *  - colabDoc.cpf
     *  - colab.situacao
     *  - colab.cargo (atual) colab_tem_cargo.e_cargo_atual = T
     */
    public function listSimplified() {
        /*$result = DB::select('SELECT f.id as `func_id`
                                , p.nome as `nome`
                                , c.cpf as `cpf`
                                , c.situacao as `situacao`
                                , cargo.nome as `cargo` 
                            FROM funcionario f JOIN colaborador c ON f.colaborador_id = c.id   
                                JOIN pessoa p ON p.id = c.pessoa_id 
                                JOIN cargo_colaborador ctc ON ctc.colaborador_id = c.id 
                                JOIN cargo ON cargo.id = ctc.cargo_id
                            WHERE c.situacao = "i"');*/
        //return $resultado;
    }

    /**
     * Verifica se o CPF já foi utilizado no cadastro de algum outro funcionario
     *  - cpf
     * 
     * @return true - se cadastrado; false - caso contrário
     */
    private function hasCPFSaved($cpf) {
        if (is_null($cpf)) {
            return false;
        }
        $result = DB::select('SELECT cpf FROM colaborador c 
                          JOIN funcionario f ON c.id = f.colaborador_id
                          WHERE c.cpf = ?', [$cpf]);
        return !empty($result);
    }

    public function checkCPF($cpf) {
        $cpfJaExiste = $this->hasCPFSaved($cpf);

        //if cpf is available, load form
        if(!($cpfJaExiste)) {
            $cargoList = $this->getCargoRepository()->all();
            $escalaList = $this->getEscalaRepository()->all();
            $tipoEscalaList = $this->getTipoEscalaRepository()->all();
            //return redirect()->action('EmployeeController@add')->with($data);
            return compact('cpf', 'cpfJaExiste', 'cargoList', 'escalaList', 'tipoEscalaList');
        }
        return compact('cpf', 'cpfJaExiste');
    }

    public function save($inputs) {
        //1. salvar pessoa
        $pessoa = $this->getPessoaRepository()->create($inputs['pessoa_nome']
                            , $inputs['pessoa_genero']
                            , $inputs['pessoa_nascimento']);
        //2. salvar colaborador
        
        $colaborador = $this->getColaboradorRepository()->create($pessoa->id
                            , $inputs['colab_admissao']
                            , $inputs['colab_situacao']
                            , $inputs['colabDoc_cpf']
                            , $inputs['colabDoc_rg']
                            , $inputs['colabDoc_rg_orgao']
                            , $inputs['colabDoc_rg_expedicao']);
        //3. salvar funcionario
        // $colabId,
        $funcionario = Funcionario::create(['colaborador_id' => $colaborador->id
                            , 'numero_reservista' => $inputs['funcDoc_reserv_numero']
                            , 'serie_reservista' => $inputs['funcDoc_reserv_serie']
                        ]);
                            //$reservNumero
                            //reservSerie]);

        //4. salvar todos os dados auxiliares 
        $this->getEscalaRepository()->createEscalaDoColaborador($colaborador->id
                            , $inputs['tipoEscala_id']
                            , $inputs['escala_id']);
        $this->getContatoRepository()->createSimplified($pessoa->id
                            , $inputs['contato_telefone']);
        
        // table many_to_many
        $this->getCargoRepository()->createCargoDoColaborador($colaborador->id
                            , $inputs['cargo_id']);
        
        return $funcionario;
    }

    public function loadFuncionario($funcId) {
        $funcionario = $this->find($funcId);
        $colaborador = $this->getColaboradorRepository()->find($funcionario->colab_id);
        $pessoa = $this->getPessoaRepository()->find($colaborador->pessoa_id);
        
        /**
         * Chamando repositórios para carregar dados de apoio
         */
        $arquivos = $this->getArquivoRepository()->listByPessoa($pessoa->id);
        $cargos = $this->getCargoRepository()->listByColaborador($colaborador->id);
        $contato = $this->getContatoRepository()->findByPessoa($pessoa->id);
        $escalas = $this->getEscalaRepository()->listByColaborador($colaborador->id);
        $horarios = $this->getHorarioRepository()->listByColaborador($colaborador->id);
        $dependentes = $this->getDependenteRepository()->listByFuncionario($funcionario->id);
        $remuneracoes = $this->getRemuneracaoRepository()->listByFuncionario($funcionario->id);
        
        $data = ['pessoa' => $pessoa
                    , 'contato' =>$contato
                    , 'colaborador' => $colaborador
                    , 'horarios' => $horarios
                    , 'arquivos' => $arquivos
                    , 'cargos' => $cargos
                    , 'escalas' => $escalas
                    , 'funcionario' => $funcionario
                    , 'dependentes' => $dependentes
                    , 'remuneracoes' => $remuneracoes];
        return $data;
    }

/**
 * Funcoes utilitárias para carregar repositories
 */
    private function getArquivoRepository() {
        return new ArquivoRepository();
    }

    private function getCargoRepository() {
        return new CargoRepository();
    }
    
    private function getColaboradorRepository() {
        return new ColaboradorRepository();
    }

    private function getContatoRepository() {
        return new ContatoRepository();
    }

    private function getDependenteRepository() {
        return new DependenteRepository();
    }

    private function getEscalaRepository() {
        return new EscalaRepository();
    }
    
    private function getHorarioRepository() {
        return new HorarioRepository();
    }

    private function getPessoaRepository() {
        return new PessoaRepository();
    }

    private function getRemuneracaoRepository() {
        return new RemuneracaoRepository();
    }

    private function getTipoEscalaRepository() {
        return new TipoEscalaRepository();
    }
}