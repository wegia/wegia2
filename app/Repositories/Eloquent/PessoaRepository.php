<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\PessoaRepositoryInterface;

use App\Models\Pessoa;

class PessoaRepository extends AbstractRepository 
                    implements PessoaRepositoryInterface {

    protected $model = Pessoa::class;

    public function create($nome, $genero, $nascimento) {
        return Pessoa::create([
            'nome' => $nome,
            'genero' => $genero,
            'nascimento' => $nascimento
        ]);
    }
}