<?php

namespace App\Repositories\Eloquent;

use App\Models\pessoa\Atendido;
use App\Models\pessoa\StatusAtendido;
use App\Models\pessoa\TipoAtendido;
use Illuminate\Cache\Repository;

use function PHPUnit\Framework\isEmpty;

class AtendidoRepository {
    protected $model = Atendido::class;

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

    /**
     * Valida o cpf 
     */
    public function validarCpf($cpf) {
        $cpf = $this->limparFormatacao($cpf);
        //Verifica se existe algum atendido registrado com esse cpf, retorna true ou false
        $cpfJaExiste = Atendido::where('cpf', $cpf)->exists();
        $cpfEvalido = $this->algoritimoDoCpf($cpf);
        if (!$cpfJaExiste && $cpfEvalido) {
            $tipos = TipoAtendido::all();
            $status = StatusAtendido::all();
            return compact('cpf', 'cpfJaExiste', 'cpfEvalido', 'tipos', 'status');
        }
        
        return compact('cpf', 'cpfJaExiste', 'cpfEvalido');
    }
    
}

