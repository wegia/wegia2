<?php
/** ATENÇÃO!!!
 *  PARA ESTE MÓDULO, SERÁ NECESSÁRIO: (1) RESOLVER O PROBLEMA DA ANEXAÇÃO DE MAIS DE UM ARQUIVO
 * NO MOMENTO DO CADASTRO DE UMA NOVA OCORRÊNCIA; (2) RESOLVER O PROBLEMA DO CARREGAMENTO DOS 
 * ARQUIVOS EXISTENTES PARA QUE SEJA POSSÍVEL ALTERÁ-LOS; (3) PERMITIR QUE SEJA POSSÍVEL ADICIONAR
 * MAIS ARQUIVOS DURANTE A ALTERAÇÃO DA OCORRÊNCIA.     
 */


namespace App\Http\Controllers;

use App\Models\pessoa\Atendido;
use App\Models\pessoa\Ocorrencia;
use App\Models\pessoa\OcorrenciaArquivo;
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
        //dd($ocorrencias); (comando p/ verificar se a função está sendo executada como o esperado).
        return view('pessoa.ocorrencias.lista', compact('ocorrencias'));
    }

    /**
     * Redireciona para a tela de edição com as informações da Ocorrência
     */
    public function telaEditar($id){
        //Buscar o modelo Ocorrência pelo ID e carregar as relações desejadas
        $ocorrencia = Ocorrencia::with(['tipoOcorrencia', 'atendido'])->find($id);
        if(!$ocorrencia){
            return view('pessoa.ocorrencias.form');
        } 
        //dd($ocorrencia); (comando p/ verificar se a função está sendo executada como o esperado).
        
        //Arquivo
        $ocorrenciaArquivos = OcorrenciaArquivo::with(['arquivo'])->where('ocorrencia_id', $ocorrencia->ocorrencia_id)->get();
        
        //Tipo da Ocorrencia
        $tipoOcorrencias = TipoOcorrencia::all();
     
        return view('pessoa.ocorrencias.edita', compact('ocorrencia', 'tipoOcorrencias', 'ocorrenciaArquivos'));

    }

    /**
     * Salvar uma Ocorrência no banco de dados
     */
    public function salvar(Request $request){
        
        //Criando um arquivo ocorrência e definindo os atributos
        $ocorrenciaArq = new OcorrenciaArquivo();
        $ocorrenciaArq->arquivo = $request->input('arquivo');
        

        //Criando uma ocorrência e definindo os atributos
        $ocorrencia = new Ocorrencia();
        $ocorrencia->atendido_id = $request->input('atendido');
        $ocorrencia->tipo_ocorrencia_id = $request->input('tipoOcorrencia');
        $ocorrencia->data = $request->input('data');
        $ocorrencia->descricao = $request->input('descricao');
        $ocorrencia->save();

        $ocorrenciaArq->ocorrencia_id = $ocorrencia->id;
        $ocorrenciaArq->save();
        

        return redirect(route('ocorrencias.listar'));
    }

    /**
     * Remove uma Ocorrência
     * @param int id
     * @return route
     */
    public function remover($id){
        $ocorrencia = Ocorrencia::find($id);
        
        //Excluindo todos os arquivos referente a ocorrencia selecionada para ser removida.
        $ocorrenciaArquivos = OcorrenciaArquivo::where('ocorrencia_id', $ocorrencia->id)->get();
        foreach($ocorrenciaArquivos as $arquivo){
            $arquivo->delete();
        }

        $ocorrencia->delete();

        //Redireciona paraa tela de listagem.
        return redirect(route('ocorrencias.listar'));
    }   

     /**
     * Edita as Informações de uma Ocorrência
     */
    public function editar(Request $request){
      

        $ocorrencia = Ocorrencia::find($request->input('id'));
        if(!$ocorrencia){
            // Lida com o caso em que o Atendido não foi encontrado 
            return view('pessoa.ocorrencias.form');
        }
        
        //criando instancias
        $ocorrenciaArquivo = OcorrenciaArquivo::find($ocorrencia->ocorrencia_id);

        //Definindo os novos dados
        $ocorrencia->data = $request->input('data');
        $ocorrencia->descricao = $request->input('descricao');
        $ocorrencia->tipo_ocorrencia_id = $request->input('tipoOcorrencia');
        $ocorrencia->save();
        $ocorrenciaArquivo->arquivo = $request->input('arquivo');
        $ocorrenciaArquivo->save();
        //Redireciona para a tela de edição
        return $this->telaEditar($ocorrencia->id);
    }
}
