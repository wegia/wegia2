<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\FuncionarioRepositoryInterface;

use App\Models\rh\Funcionario;

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
        $result = DB::select('SELECT f.id as `func_id`
                                , p.nome as `nome`
                                , c.cpf as `cpf`
                                , c.situacao as `situacao`
                                , cargo.nome as `cargo` 
                            FROM funcionario f JOIN colaborador c ON f.colab_id = c.id   
                                JOIN pessoa p ON p.id = c.pessoa_id 
                                JOIN colab_tem_cargo ctc ON ctc.colab_id = c.id 
                                JOIN cargo ON cargo.id = ctc.cargo_id
                            WHERE ctc.e_cargo_atual = true');
        return $result;
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
        $result = DB::select('SELECT cpf FROM funcionario f JOIN colaborador c
                                    ON f.colab_id = c.id 
                                WHERE c.cpf = ?', [$cpf]);
        //return ($result['cpf'] !== null)? 'true' : 'false';
        return empty($result)? false : true;
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
        print_r($inputs);
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
        $funcionario = Funcionario::create(['colab_id' => $colaborador->id
                            , 'reserv_numero' => $inputs['funcDoc_reserv_numero']
                            , 'reserv_serie' => $inputs['funcDoc_reserv_serie']
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