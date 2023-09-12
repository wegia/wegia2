<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\ArquivoRepositoryInterface;

use App\Models\pessoa\Arquivo;

class ArquivoRepository extends AbstractRepository 
                    implements ArquivoRepositoryInterface {

    protected $model = Arquivo::class;

    public static function listByPessoa($pessoaId) {
        return DB::select('SELECT a.* FROM arquivo a WHERE a.pessoa_id  = ?', array($pessoaId));
    }
}
