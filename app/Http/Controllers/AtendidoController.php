<?php

namespace App\Http\Controllers;

use App\Models\pessoa\Atendido;
use App\Models\pessoa\StatusAtendido;
use App\Models\pessoa\TipoAtendido;
use App\Repositories\Eloquent\AtendidoRepository;
use Illuminate\Http\Request;

class AtendidoController extends Controller
{
    protected AtendidoRepository $repository;
    public function __construct(AtendidoRepository $repository)
    {
        $this->repository = $repository;
    }
     
    /**Redireciona para o painel com as opções de cadastro e login 
    */
    public function painel(){
        return view('pessoa.atendidos.atendido');
    }

    /**
     * Redireciona para a tela de listagem
     */
    public function index(){
        return view('pessoa.atendidos.lista');
    }

    public function cadastrar(){
        return view('pessoa.atendidos.form');
    }

    public function validarCpf(Request $request){
        $cpf = $request->input('cpf');
        $repository = new AtendidoRepository;
        $cpfValidado = $repository->validarCpf($cpf);

        return view('pessoa.atendidos.form', $cpfValidado);
    }

    /**
     * Salva um Atendido no banco de dados
     */
    public function salvar(Request $request){
        dd($request->input('nome'));
    }

    /**
     * Lista todos os Atendidos 
     */
    public function listar(){
        $atendidos = Atendido::with(['pessoa','tipoAtendido', 'statusAtendido'])->get();
        $status = StatusAtendido::all();

        return view('pessoa.atendidos.lista')->with('atendidos', $atendidos)->with('status', $status);
    }

    /**
     * Edita um Atendido
     */
    public function editar(){

    }

    /**
     * Salva um status no banco de dados
     */
    public function addStatus(Request $request){
        // Obtenha o novo status dos dados da solicitação
        $novoStatus = $request->input('status');

        // Salve o novo status no banco de dados
        $status = new StatusAtendido();
        $status->status = $novoStatus;
        $status->save();

        // Retorne uma resposta de sucesso para a solicitação AJAX
        return response()->json(['mensagem' => 'Status salvo com sucesso']);
    }

    /**
     * Salva um tipo no banco de dados
     */
    public function addTipo(Request $request){
        // Obtenha o novo status dos dados da solicitação
        $novoTipo = $request->input('tipo');

        // Salve o novo status no banco de dados
        $tipo = new TipoAtendido();
        $tipo->descricao = $novoTipo;
        $tipo->save();

        // Retorne uma resposta de sucesso para a solicitação AJAX
        return response()->json(['mensagem' => 'Tipo salvo com sucesso']);
    }

    /**
     * Retorna todos os status
     */
    public function listarStatus(){
        return StatusAtendido::all();
    }

    /**
     * Retorna todos os tipos
     */
    public function listarTipos(){
        return TipoAtendido::all();
    }
}
