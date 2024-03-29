<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\ColaboradorRepositoryInterface;

use App\Models\pessoa\Colaborador;

class ColaboradorRepository extends AbstractRepository 
                    implements ColaboradorRepositoryInterface {

    protected $model = Colaborador::class;


    public function create($pessoaId, $admissaoDate, $situacao, $rg, $rgOrgao, $rgExpedicao) {

        return Colaborador::create([
            'pessoa_id' => $pessoaId,
            'admissao' => $admissaoDate,
            'situacao' => $situacao, 
            'rg' => $rg,
            'rg_orgao' => $rgOrgao,
            'rg_data_expedicao' => $rgExpedicao
        ]);
    }
    
}