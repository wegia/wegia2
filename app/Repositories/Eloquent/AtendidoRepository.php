<?php

namespace App\Repositories\Eloquent;

use App\Models\Pessoa;
use App\Models\pessoa\Atendido;
use App\Models\pessoa\StatusAtendido;
use App\Models\pessoa\TipoAtendido;
use Illuminate\Cache\Repository;

use function PHPUnit\Framework\isEmpty;

class AtendidoRepository {
    protected $model = Atendido::class;
    protected PessoaRepository $pessoa;
    public function __construct($repository = new PessoaRepository)
    {
        $this->pessoa = $repository;
    }
    
    /**
     * Valida o cpf 
     */
    public function validarCpf($cpf) {
        //$pessoa = new PessoaRepository;
        $cpf = $this->pessoa->limparFormatacao($cpf);
        //Verifica se existe algum atendido registrado com esse cpf, retorna true ou false
        $cpfJaExiste = Pessoa::where('cpf', $cpf)->exists();
        $cpfEvalido = $this->pessoa->algoritimoDoCpf($cpf);
        if (!$cpfJaExiste && $cpfEvalido) {
            $tipos = TipoAtendido::all();
            $status = StatusAtendido::all();
            return compact('cpf', 'cpfJaExiste', 'cpfEvalido', 'tipos', 'status');
        }
        
        return compact('cpf', 'cpfJaExiste', 'cpfEvalido');
    }
    
}

