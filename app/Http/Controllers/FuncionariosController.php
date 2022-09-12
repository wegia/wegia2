<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request; 
use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\FuncionarioRepositoryInterface;

use App\Models\rh\Cargo;
use App\Models\rh\Escala;
use App\Models\rh\TipoEscala;

class FuncionariosController extends Controller {

    protected $funcionarioRepository;

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

    public function list(FuncionarioRepositoryInterface $model) {
        $lista = $this->funcionarioRepository->listSimplified();
        return view('rh.funcionarios.lista')->with('lista', $lista);
    }

    public function get($id) {
        return $this->funcionarioRepository->find($id); //$result;
        //return view('people.employees.detail', compact('result'));
    }

    /**
     * funcoes de navegacao 
     */
    public function add() {
        return view('rh.funcionarios.form');
    }

    public function edit($funcId) {
        $data = $this->funcionarioRepository->loadFuncionario($funcId);
        return view('rh.funcionarios.edita', $data);
    }

    public function checkCPF() {
        $cpf = Request::input('cpf');

        $result = $this->funcionarioRepository->checkCPF($cpf);

        return view('rh.funcionarios.form', $result);
    }


}
