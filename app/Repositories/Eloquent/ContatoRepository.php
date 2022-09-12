<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\ContatoRepositoryInterface;

use App\Models\rh\Contato;

class ContatoRepository extends AbstractRepository 
                    implements ContatoRepositoryInterface {

    protected $model = Contato::class;

    public function createSimplified($pessoaId, $telefone) {
        return Contato::create([
            'pessoa_id' => $pessoaId,
            'telefone' => $telefone
        ]);
    }

    public function findByPessoa($pessoaId) {
        return DB::select('SELECT * FROM contato c WHERE c.pessoa_id = ?', array($pessoaId))[0];
    }
}