<?php

namespace App\Http\Controllers;

use App\Models\pessoa\Atendido;
use App\Models\pessoa\Ocorrencia;
use App\Models\pessoa\TipoOcorrencia;
use Illuminate\Http\Request;

class OcorrenciaController extends Controller
{
    public function __construct(){

    }

    /**Redireciona para o painel
     */
    public function painel(){
        return view('pessoa.ocorrencias.ocorrencia');
    }

   /**
    * Redireciona para a tela de cadastro
    */
    public function cadastrar(){
        $atendidos = Atendido::with('pessoa')->get();
        $tipoOcorrencias = TipoOcorrencia::all();
        return view('pessoa.ocorrencias.form', compact('atendidos', 'tipoOcorrencias'));
    }

    /**
     * Redireciona para a tela de listagem
     */
    public function listar(){
        $ocorrencias = Ocorrencia::with('atendido')->get();
        //dd($ocorrencias);
        return view('pessoa.ocorrencias.lista', compact('ocorrencias'));
    }


    /**
     * Salvar uma Ocorrência no banco de dados
     */
    public function salvar(Request $request){
        //dd($request);
        //Criando um atendido  e definindo os atributos
        $ocorrencia = new Ocorrencia();
        $ocorrencia->atendido_id = $request->input('atendido');
        $ocorrencia->tipo_ocorrencia_id = $request->input('tipoOcorrencia');
        $ocorrencia->data = $request->input('data');
        $ocorrencia->arquivo = $request->input('arquivo');
        $ocorrencia->descricao = $request->input('descricao');
        $ocorrencia->save();
        return redirect(route('ocorrencias.listar'));
    }

    /**
     * Remove uma Ocorrência
     */
    public function remover($id){
        $ocorrencia = Ocorrencia::find($id);
        $ocorrencia->delete();
        return redirect(route('ocorrencias.listar'));
    }
    
    /**
     * Redireciona para a tela de edição com as imformações da Ocorrência
     */


}
