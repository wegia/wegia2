<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Repositories\Contracts\ColaboradorRepositoryInterface;

use App\Models\rh\Colaborador;

class ColaboradorRepository extends AbstractRepository 
                    implements ColaboradorRepositoryInterface {

    protected $model = Colaborador::class;


    public function create($pessoaId, $admissaoDate, $situacao, $cpf, $rg, $rgOrgao, $rgExpedicao) {
        return Colaborador::create([
            'pessoa_id' => $pessoaId,
            'admissao' => $admissaoDate,
            'situacao' => $situacao, 
            'cpf' => $cpf,
            'rg' => $rg,
            'rg_orgao' => $rgOrgao,
            'rg_expedicao' => $rgExpedicao
        ]);
    }
    
}