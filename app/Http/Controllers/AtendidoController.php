<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\pessoa\Arquivo;
use App\Models\pessoa\Atendido;
use App\Models\pessoa\Contato;
use App\Models\pessoa\Familiar;
use App\Models\pessoa\StatusAtendido;
use App\Models\pessoa\TipoArquivo;
use App\Models\pessoa\TipoAtendido;
use App\Models\pessoa\utils\Parentesco;
use App\Models\pessoa\utils\Uf;
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

    /**
     * Redireciona para a tela de cadastro
     */
    public function cadastrar(){
        return view('pessoa.atendidos.form');
    }

    /**
     * Redireciona para a tela de edição com as informações do Atendido
     */
    public function telaEditar($id){
        // Busque o modelo Atendido pelo ID e carregue as relações desejadas
        $atendido = Atendido::with(['pessoa', 'tipoAtendido', 'statusAtendido', 'pessoa.contato', 'pessoa.contato.uf'])->find($id);
        
        if (!$atendido) {
            return view('pessoa.atendidos.form');        
        }

        //Arquivo
        $arquivos = Arquivo::with(['tipoArquivo'])->where('pessoa_id', $atendido->pessoa_id)->get();
        $tipoArquivos = TipoArquivo::all();
        
        //Familiar
        $familiares = Familiar::with(['parentesco', 'pessoa'])->where('atendido_id', $atendido->id)->get();
        $parentescos = Parentesco::all();
        // Retorne a view com os dados        
        return view('pessoa.atendidos.edita', compact('atendido', 'arquivos', 'tipoArquivos', 'familiares', 'parentescos'));
    }

    /**
     * Valida o cpf e Redireciona para o formulario de cadastro 
     */
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
        //Criando uma pessoa e definindo os atributos
        $pessoa = new Pessoa();
        $pessoa->nome = $request->input('nome');
        $pessoa->genero = $request->input('genero');
        $pessoa->nascimento = $request->input('nascimento');
        $pessoa->cpf = $request->input("cpf");
        $pessoa->save();
        //Buscando o Uf vazio, pois esse valor não é passado no formulário
        //e como uf sempre terá os mesmos valores não é necessário criar um novo
        //em todo cadastro
        $uf = Uf::find(28);
        $uf->save();
        //Criando um contato e definindo os atributos
        $contato = new Contato();
        $contato->telefone = $request->input("telefone");
        $contato->pessoa_id = $pessoa->id;
        $contato->uf_id = $uf->id;
        $contato->save();
        //Criando um atendido e definindo os atributos
        $atendido = new Atendido();
        $atendido->pessoa_id = $pessoa->id;
        $atendido->status_atendido_id = $request->input('status_id');
        $atendido->tipo_atendido_id = $request->input('tipo_id');        
        $atendido->save();
        //Redirecionar para a tela de listagem
        return redirect(route('atendidos.listar'));
    }

    /**
     * Remove um Atendido
     * @param int id
     * @return route
     */
    public function remover($id){
        $atendido = Atendido::find($id);
        $pessoaAtendido = Pessoa::find($atendido->pessoa_id);
        $contato = Contato::where('pessoa_id', $pessoaAtendido->id)->first();
        $familiares = Familiar::where('atendido_id', $atendido->id)->get();
        $arquivos = Arquivo::where('pessoa_id', $pessoaAtendido->id)->get();
        //Excluindo os arquivos
        foreach($familiares as $familiar){
            $familiarController = new FamiliarController();
            $familiarController->remover($familiar->id);
        }
        foreach($arquivos as $arquivo){
            $arquivo->delete();
        }
        $contato->delete();
        $atendido->delete(); 
        $pessoaAtendido->delete();
        //Redirecionar para a tela de listagem
        return redirect(route('atendidos.listar'));
    }

    /**
     * Lista todos os Atendidos 
     */
    public function listar(){
        $atendidos = Atendido::with(['pessoa','tipoAtendido', 'statusAtendido'])->get();
        $status = StatusAtendido::all();

        return view('pessoa.atendidos.lista')->with('atendidos', $atendidos)->with('status', $status);
    }

    // public function listarJson(){
    //     $atendidos = Atendido::with(['pessoa','tipoAtendido', 'statusAtendido'])->get();
    //     $status = StatusAtendido::all();
    //     dd(json_encode([$atendidos, 'status'=> $status]));
    //     return  [$atendidos, 'status'=> $status];
    // }

    

    /**
     * Edita as Informações Pessoais de um Atendido 
     */
    public function editarPessoais(Request $request){
       $atendido =  Atendido::find($request->input('id'));
       if (!$atendido) {
            // Lide com o caso em que o Atendido não foi encontrado (por exemplo, exiba uma mensagem de erro ou redirecione)
            return view('pessoa.atendidos.form');
        }
        //Criando as instancias
        $contato = Contato::find($request->input('contato_id'));
        $pessoa = Pessoa::find($atendido->pessoa_id);
        $tipo = TipoAtendido::find($atendido->tipo_atendido_id);
        $status = TipoAtendido::find($atendido->status_atendido_id);

        //Definindo os novos dados
        $pessoa->nome = $request->input('nome');
        $pessoa->genero = $request->input('genero');
        $pessoa->nascimento = $request->input('nascimento');
        $pessoa->tipo_sangue = $request->input('tipo_sangue');
        $pessoa->save();
        $contato->telefone = $request->input("telefone");
        $contato->save();

        //Redireciona para a tela de edição
        return $this->telaEditar($atendido->id);
    }

    /**
     * Edita o Endereço de um Atendido
     */
    public function editarEndereco(Request $request){
        $atendido =  Atendido::find($request->input('id'));
        if (!$atendido) {
             // Lide com o caso em que o Atendido não foi encontrado (por exemplo, exiba uma mensagem de erro ou redirecione)
             return view('pessoa.atendidos.form');
         }
         //Criando as instancias
         $contato = Contato::find($request->input('contato_id'));
         $uf = Uf::find($contato->uf_id);
         
         //Definindo os novos dados
         $contato->cep = $request->input('cep');
         $siglaEstado = $request->input('estado');
         $uf = Uf::where('sigla', $siglaEstado)->first();
         if ($uf) {
             $contato->uf_id = $uf->id;
         } else {
             // Trate o caso em que a sigla do estado não foi encontrada (por exemplo, exiba uma mensagem de erro)
         }
         $contato->cidade = $request->input('cidade');
         $contato->bairro = $request->input('bairro');
         $contato->logradouro = $request->input('logradouro');
         $contato->numero = $request->input('numero');
         $contato->complemento = $request->input('complemento');
         $contato->codigo_ibge = $request->input('codigo_ibge');
         
         $contato->save();
 
         //Redireciona para a tela de edição
         return $this->telaEditar($atendido->id);
     }

     /**
     * Edita a Documentação de um Atendido 
     */
    public function editarDocumentacao(Request $request){
        $atendido =  Atendido::find($request->input('id'));
        if (!$atendido) {
             // Lide com o caso em que o Atendido não foi encontrado (por exemplo, exiba uma mensagem de erro ou redirecione)
             return view('pessoa.atendidos.form');
         }
         //Criando as instancias
         $pessoa = Pessoa::find($atendido->pessoa_id);
 
         //Definindo os novos dados
         $pessoa->rg = $request->input('rg');
         $pessoa->rg_orgao = $request->input('rg_orgao');
         $pessoa->rg_data_expedicao = $request->input('rg_data_expedicao');
         $pessoa->rg_data_vencimento = $request->input('rg_data_vencimento');
         $pessoa->save();
 
         //Redireciona para a tela de edição
         return $this->telaEditar($atendido->id);
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
