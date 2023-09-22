<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\PessoaRepositoryInterface;

use App\Models\Pessoa;

class PessoaRepository extends AbstractRepository 
                    implements PessoaRepositoryInterface {

    protected $model = Pessoa::class;

    public function __construct()
    {
        
    }

    public function create($nome, $genero, $nascimento) {
        return Pessoa::create([
            'nome' => $nome,
            'genero' => $genero,
            'nascimento' => $nascimento
        ]);
    }
    /**
     * Transforma o cpf em um texto simples
     */
    public function limparFormatacao($cpf) {
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        return $cpf;
    }    

    /**
     * Realiza a conta para verificar se um cpf é valido
     */
    public function algoritimoDoCpf($cpf){
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    
}