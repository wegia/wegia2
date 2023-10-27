<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\pessoa\Atendido;
use App\Models\pessoa\Contato;
use App\Models\pessoa\Familiar;
use App\Models\pessoa\utils\Parentesco;
use App\Models\pessoa\utils\Uf;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class FamiliarController extends Controller
{
    /**
     * Salva um familiar no banco de dados
     */
    public function salvar(Request $request){
        $familiar = new Familiar();
        $pessoa = new Pessoa();
        $contato = new Contato();
        
        //Salvando os dados da pessoa
        $pessoa->nome = $request->input('nome');
        $pessoa->cpf = $request->input('cpf');
        $pessoa->genero = $request->input('genero'); 
        $pessoa->nascimento = $request->input('nascimento');
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
}
