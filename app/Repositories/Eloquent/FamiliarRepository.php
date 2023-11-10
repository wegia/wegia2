<?php

namespace App\Repositories\Eloquent;

use App\Models\Pessoa;
use App\Models\pessoa\Familiar;

class FamiliarRepository {
    protected $model = Familiar::class;
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
            
            return compact('cpf', 'cpfJaExiste', 'cpfEvalido', 'tipos', 'status');
        }
        
        return compact('cpf', 'cpfJaExiste', 'cpfEvalido');
    }

}