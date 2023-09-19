<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request; 
use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\FuncionarioRepositoryInterface;

use App\Models\pessoa\Cargo;
use App\Models\pessoa\Escala;
use App\Models\pessoa\Funcionario;
use App\Models\pessoa\TipoEscala;
use App\Repositories\Eloquent\FuncionarioRepository;

class FuncionariosController extends Controller {

    protected FuncionarioRepository $funcionarioRepository;

    public function __construct(FuncionarioRepositoryInterface $funcionarioRepository) {
        //$this->middleware('auth');
        //Carregando o Repository
        $this->funcionarioRepository = $funcionarioRepository;
    }

    /**
     * Operacoes
     */
    public function save() {
        $inputs = Request::all();
        $funcionario = $this->funcionarioRepository->save($inputs);
        
        $message = 'Funcionário '.$inputs['pessoa_nome'].' foi criado com sucesso!';
        return redirect()
            ->route('listaFuncionarios')
            ->with('message', $message);
    }

    public function list() {
        $lista = Funcionario::with(['colaborador.pessoa','colaborador.cargoColaboradores.cargo'])->get();
        return view('pessoa.funcionarios.lista', ['lista'=> $lista]);
    }

    public function get($id) {
        return $this->funcionarioRepository->find($id); //$result;
        //return view('people.employees.detail', compact('result'));
    }

    /**
     * funcoes de navegacao 
     */
    public function add() {
        return view('pessoa.funcionarios.form');
    }

    public function edit($funcId) {
        $data = $this->funcionarioRepository->loadFuncionario($funcId);
        return $data;
        //return view('pessoa.funcionarios.edita', $data);
    }

    public function checkCPF() {
        $cpf = Request::input('cpf');

        $result = $this->funcionarioRepository->checkCPF($cpf);

        return view('pessoa.funcionarios.form', $result);
    }


}
