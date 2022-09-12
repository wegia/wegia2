<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\TipoEscalaRepositoryInterface;

use App\Models\rh\TipoEscala;

class TipoEscalaRepository extends AbstractRepository 
                    implements TipoEscalaRepositoryInterface {

    protected $model = TipoEscala::class;

    
}
