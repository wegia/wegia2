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

    

}