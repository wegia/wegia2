<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model {
    use HasFactory;

    protected $table = 'dependente';
    public $timestamps = false;

    protected $fillable = array('nome', 'genero', 'func_id', 'parentesco','telefone', 'nascimento'
                                    ,'cpf', 'rg', 'rg_orgao', 'rg_expedicao', 'rg_vencimento');

    protected $guarded = ['id'];


}
