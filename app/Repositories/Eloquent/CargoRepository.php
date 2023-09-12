<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\CargoRepositoryInterface;

use App\Models\pessoa\Cargo;
use App\Models\pessoa\ColabCargo;

class CargoRepository extends AbstractRepository 
                    implements CargoRepositoryInterface {

    protected $model = Cargo::class;

    public function createCargoDoColaborador($colabId, $cargoId) {
        return ColabCargo::create([
            'colab_id' => $colabId,
            'cargo_id' => $cargoId
        ]);
    }

    public function listByColaborador($colabId) {
        return DB::select('SELECT c.* FROM colab_tem_cargo ctc JOIN cargo c ON ctc.cargo_id = c.id 
                                WHERE ctc.colab_id = ?', array($colabId));
    }
}
