<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\pessoa\Atendido;
use App\Models\pessoa\Contato;
use App\Models\pessoa\Familiar;
use App\Models\pessoa\utils\Parentesco;
use App\Models\pessoa\utils\Uf;
use App\Repositories\Eloquent\FamiliarRepository;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class FamiliarController extends Controller
{
    /**
     * Exibe o formulario para Editar Familiar
     */
    public function telaEditar($id){
        $familiar = Familiar::with(['pessoa', 'parentesco'])->find($id);
        return view('pessoa.atendidos.editaFamiliar', compact('familiar'));
    }

    /**
     * Salva um familiar no banco de dados
     */
    public function salvar(Request $request){
        $familiar = new Familiar();
        $pessoa = new Pessoa();
        $contato = new Contato();
        
        $cpf = $request->input('cpf');

        //Salvando os dados da pessoa
        $pessoa->nome = $request->input('nome');
        $pessoa->cpf = $cpf;
        $pessoa->genero = $request->input('genero'); 
        $pessoa->nascimento = $request->input('nascimento');
        $pessoa->rg = $request->input('rg');
        $pessoa->rg_orgao = $request->input('rg_orgao');
        $pessoa->rg_data_expedicao = $request->input('rg_data_expedicao');
        $pessoa->save();

        //Buscando o Uf vazio, pois esse valor não é passado no formulário
        //e como uf sempre terá os mesmos valores não é necessário criar um novo
        //em todo cadastro
        $uf = Uf::find(28);
        $uf->save();
        //salvando o telefone em contato
        $contato->telefone = $request->input('telefone');
        $contato->pessoa_id = $pessoa->id;
        $contato->uf_id = $uf->id;
        $contato->save();
        //Salvando os dados do familiar
        //Adicionar Verificações!!!!
        $atendido_id = $request->input('atendido_id');
        $parentesco_id = $request->input('parentesco');
        $familiar->pessoa_id = $pessoa->id;
        $familiar->atendido_id = $atendido_id;
        $familiar->parentesco_id = $parentesco_id;
        $familiar->save();

        //Redirecionar para a tela de listagem de um Atendido
        return redirect(route('atendidos.telaEditar', ['id' => $atendido_id]));
    }

    /**
     * Remove um familiar pelo javascript
     */
    public function remover($id){
        $familiar = Familiar::find($id);
        if (!$familiar) {
            // Lidar com o caso em que o Familiar não foi encontrado
            return response()->json(['message' => 'Familiar não encontrado'], 404);
        }
    
        $pessoa = Pessoa::find($familiar->pessoa_id);
    
        if (!$pessoa) {
            // Lidar com o caso em que a Pessoa não foi encontrada
            return response()->json(['message' => 'Pessoa não encontrada'], 404);
        }
    
        $contato = Contato::where('pessoa_id', $familiar->pessoa_id)->first();

        if (!$contato) {
            // Lidar com o caso em que o Contato não foi encontrado
            return response()->json(['message' => 'Contato não encontrado'], 404);
        }

        $contato->delete();
        $pessoa->delete();
        $familiar->delete();

        return response()->json(['message' => 'Familiar excluído com sucesso'], 200);
    }

    /**
     * Edita as informações pessoais de um familiar
     */
    public function editarPessoais(Request $request){
        $familiar =  Familiar::find($request->input('id'));
       if (!$familiar) {
            // Lide com o caso em que o Atendido não foi encontrado (por exemplo, exiba uma mensagem de erro ou redirecione)
            return view('pessoa.atendidos.form');
        }
        //Criando as instancias
        $contato = Contato::find($request->input('contato_id'));
        $pessoa = Pessoa::find($familiar->pessoa_id);

        //Definindo os novos dados
        $pessoa->nome = $request->input('nome');
        $pessoa->genero = $request->input('genero');
        $pessoa->nascimento = $request->input('nascimento');
        $pessoa->tipo_sangue = $request->input('tipo_sangue');
        $pessoa->save();
        $contato->telefone = $request->input("telefone");
        $contato->save();

        //Redireciona para a tela de edição
        return $this->telaEditar($familiar->id);
    }

    /**
     * Edita o endereço de um familiar
     */
    public function editarEndereco(Request $request){
        $familiar =  Familiar::find($request->input('id'));
        if (!$familiar) {
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
         return $this->telaEditar($familiar->id);
    }

    /**
     * Edita a documentaçõa do Familiar
     */
    public function editarDocumentacao(Request $request){
        $familiar =  Familiar::find($request->input('id'));
        if (!$familiar) {
             // Lide com o caso em que o Atendido não foi encontrado (por exemplo, exiba uma mensagem de erro ou redirecione)
             return view('pessoa.atendidos.form');
         }
         //Criando as instancias
         $pessoa = Pessoa::find($familiar->pessoa_id);
 
         //Definindo os novos dados
         $pessoa->rg = $request->input('rg');
         $pessoa->rg_orgao = $request->input('rg_orgao');
         $pessoa->rg_data_expedicao = $request->input('rg_data_expedicao');
         $pessoa->rg_data_vencimento = $request->input('rg_data_vencimento');
         $pessoa->save();
 
         //Redireciona para a tela de edição
         return $this->telaEditar($familiar->id);
    }
}
