<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\RemuneracaoRepositoryInterface;

use App\Models\pessoa\Remuneracao;

class RemuneracaoRepository extends AbstractRepository 
                    implements RemuneracaoRepositoryInterface {

    protected $model = Remuneracao::class;

    public function listByFuncionario($funcId) {
        return DB::select('SELECT r.*, tr.nome as tipo  FROM remuneracao r 
                            JOIN tipo_remuneracao tr ON r.tipo_id = tr.id 
                            WHERE r.func_id = ?', array($funcId));
    }
}
