<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request; 
use Illuminate\Support\Facades\DB;

use App\Models\Arquivo;
use App\Models\Cargo;
use App\Models\ColabCargo;
use App\Models\ColabEscala;
use App\Models\Colaborador;
use App\Models\Contato;
use App\Models\Dependente;
use App\Models\Escala;
use App\Models\Funcionario;
use App\Models\Horario;
use App\Models\Pessoa;
use App\Models\Remuneracao;
use App\Models\TipoEscala;




class FuncionariosController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }


    public function save() {
        $inputs = Request::all();

        // $inputs['person_phone'], contato
        $pessoa = $this->storePessoa($inputs['pessoa_nome'], $inputs['pessoa_genero'], 
                                $inputs['pessoa_nascimento']);

        $colaborador = $this->storeColaborador($pessoa->id, $inputs['colab_admissao'], $inputs['colab_situacao'], 
                                                $inputs['colabDoc_cpf'], $inputs['colabDoc_rg'], 
                                                $inputs['colabDoc_rg_orgao'], $inputs['colabDoc_rg_expedicao']);

        $funcionario = $this->storeFuncionario($colaborador->id, $inputs['funcDoc_reserv_numero'], $inputs['funcDoc_reserv_serie']);

        // storing auxiliar data 
        // tables one-to-many
        $this->storeColabEscala($colaborador->id, $inputs['tipoEscala_id'], $inputs['escala_id']);
        $this->storeContato($pessoa->id, $inputs['contato_telefone']);
        
        // table many_to_many
        $this->storeColabCargo($colaborador->id, $inputs['cargo_id']);

        $message = 'Funcionário '.$pessoa->nome.' foi criado com sucesso!';
        return redirect()
            ->route('listaFuncionarios')
            ->with('message', $message);
    }

    public function list() {
        $funcionario = new Funcionario();

        $lista = $funcionario->listSimplified();
        //return $lista;
        return view('rh.funcionarios.lista')->with('lista', $lista);
    }

    public function get($id) {
        $result = Funcionario::find($id);
        return $result;
        //return view('people.employees.detail', compact('result'));
    }

    /* navigagion functions */
    public function add() {
        return view('rh.funcionarios.form');
    }

    public function edit($funcId) {
        $funcionario = Funcionario::find($funcId);
        $colaborador = Colaborador::find($funcionario->colab_id);
        $pessoa = Pessoa::find($colaborador->pessoa_id);
        
        //$arquivos = new Arquivo();
        $arquivos = Arquivo::listByPessoa($pessoa->id);
        $horarios = Horario::listByColaborador($colaborador->id);
        $cargos = Cargo::listByColaborador($colaborador->id);
        $escalas = Escala::listByColaborador($colaborador->id);
        $dependentes = Dependente::listByFuncionario($funcionario->id);
        $remuneracoes = Remuneracao::listByFuncionario($funcionario->id);
        $contato = Contato::get($pessoa->id);
        
        $data = ['pessoa' => $pessoa, 'contato' =>$contato, 'colaborador' => $colaborador, 'horarios' => $horarios
                    , 'arquivos' => $arquivos, 'cargos' => $cargos, 'escalas' => $escalas
                    , 'funcionario' => $funcionario, 'dependentes' => $dependentes, 'remuneracoes' => $remuneracoes];
        //return $data;
        return view('rh.funcionarios.edita', $data);
    }

    public function checkCPF() {
        $cpf = Request::input('cpf');

        $funcionario= new Funcionario();
        $cpfJaExiste = $funcionario->hasCPFSaved($cpf);

        //if cpf is available, load form
        if(!($cpfJaExiste)) {
            $cargoList = Cargo::all();
            $escalaList = Escala::all();
            $tipoEscalaList = TipoEscala::all();
            //return redirect()->action('EmployeeController@add')->with($data);
            return view('rh.funcionarios.form', compact('cpf', 'cpfJaExiste', 'cargoList', 'escalaList', 'tipoEscalaList'));
        }
        //cpf is used
        return view('rh.funcionarios.form', compact('cpf', 'cpfJaExiste'));
    }

    private function storePessoa($nome, $genero, $nascimento) {
        return Pessoa::create([
            'nome' => $nome,
            'genero' => $genero,
            'nascimento' => $nascimento
        ]);
    }

    private function storeContato($pessoaId, $telefone) {
        return Contato::create([
            'pessoa_id' => $pessoaId,
            'telefone' => $telefone
        ]);
    }

    private function storeColabCargo($colabId, $cargoId) {
        return ColabCargo::create([
            'colab_id' => $colabId,
            'cargo_id' => $cargoId
        ]);
    }

    private function storeColaborador($pessoaId, $admissaoDate, $situacao, $cpf, $rg, $rgOrgao, $rgExpedicao) {
        return Colaborador::create([
            'pessoa_id' => $pessoaId,
            'admissao' => $admissaoDate,
            'situacao' => $situacao, 
            'cpf' => $cpf,
            'rg' => $rg,
            'rg_orgao' => $rgOrgao,
            'rg_expedicao' => $rgExpedicao
        ]);
    }

    private function storeFuncionario($colabId, $reservNumero, $reservSerie) {
        return Funcionario::create([
            'colab_id' => $colabId,
            'reserv_numero' => $reservNumero,
            'reserv_serie' => $reservSerie
        ]);
    }

    private function storeColabEscala($colabId, $escalaId, $tipoEscalaId) {
        return ColabEscala::create([
            'colab_id' => $colabId,
            'escala_id' => $escalaId,
            'tipo_id' => $tipoEscalaId
        ]);
    }

}
