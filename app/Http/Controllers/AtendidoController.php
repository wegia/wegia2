<?php

namespace App\Http\Controllers;

use App\Models\pessoa\Atendido;
use App\Models\pessoa\StatusAtendido;
use Illuminate\Http\Request;

class AtendidoController extends Controller
{
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

    /**
     * Salva um Atendido no banco de dados
     */
    public function salvar(){

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
}
