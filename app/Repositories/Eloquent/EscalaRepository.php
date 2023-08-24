<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\EscalaRepositoryInterface;

use App\Models\rh\ColaboradorEscala;
use App\Models\rh\Escala;

class EscalaRepository extends AbstractRepository
                    implements EscalaRepositoryInterface {

    protected $model = Escala::class;

    public function createEscalaDoColaborador($colabId, $escalaId, $tipoEscalaId) {
        return ColaboradorEscala::create([
            'colab_id' => $colabId,
            'escala_id' => $escalaId,
            'tipo_id' => $tipoEscalaId
        ]);
    }

    public static function listByColaborador($colabId) {
        return DB::select('SELECT e.* FROM colab_tem_escala cte JOIN escala e ON cte.escala_id = e.id
                                WHERE cte.colab_id = ?', array($colabId));
    }
}
