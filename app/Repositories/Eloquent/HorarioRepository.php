<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\HorarioRepositoryInterface;

use App\Models\rh\Horario;

class HorarioRepository extends AbstractRepository 
                    implements HorarioRepositoryInterface {

    protected $model = Horario::class;

    public static function listByColaborador($colabId) {
        return DB::select('SELECT h.* FROM horario h WHERE h.colab_id = ?', array($colabId));
    }

}
