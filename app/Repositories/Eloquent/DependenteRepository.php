<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\DependenteRepositoryInterface;

use App\Models\rh\Dependente;

class DependenteRepository extends AbstractRepository 
                    implements DependenteRepositoryInterface {

    protected $model = Dependente::class;

    public static function listByFuncionario($funcId) {
        return DB::select('SELECT * FROM dependente d WHERE d.func_id = ?', array($funcId));
    }
}
