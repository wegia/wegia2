<?php

namespace App\Http\Controllers;

use App\Models\pessoa\Arquivo;
use App\Models\pessoa\Atendido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ArquivoController extends Controller
{
    /**
     * Salvar um novo arquivo
     */
    public function salvar(Request $request){
        $arquivo = new Arquivo();
        $arquivo->pessoa_id = $request->input('pessoa_id');
        $arquivo->tipo_arquivo_id = $request->input('tipoArquivo');
        $arquivo->binario_arquivo = $request->input('arquivo');
        $arquivo->data_cadastro = Carbon::now()->format('Y-m-d');

        $arquivo->save();
        //Pegando o id do Atendido
        $atendido_id = $request->input('atendido_id');
        
        //Redirecionar para a tela de listagem de um Atendido
        return redirect(route('atendidos.telaEditar', ['id' => $atendido_id]));
    }

    /**
     * Função para remover um arquivo que será chamada pelo javascript
     */
    public function remover($id){
        $arquivo = Arquivo::find($id);
        $arquivo->delete();
        
    }

    /**
     * Retorna todos os Arquivos
     */
    public function listarArquivos(){
        return Arquivo::all();
    }
}
