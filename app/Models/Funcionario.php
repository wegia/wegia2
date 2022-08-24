<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dependente;
use App\Models\Remuneracao;

class Funcionario extends Model {
    use HasFactory;

    protected $table = 'funcionario';
    public $timestamps = false;

    protected $fillable = array('colab_id','pis', 'ctps', 'ctps_estado'
                        , 'eleitor_numero', 'eleitor_zona', 'eleitor_secao'
                        , 'reserv_numero', 'reserv_orgao', 'reserv_serie');

    protected $guarded = ['id'];

    public function dependentes() {
        return $this->hasMany(Dependente::class, 'func_id');
    }

    public function remuneracoes() {
        return $this->hasMany(Remuneracao::class, 'func_id');
    }

    public function hasCPFSaved($cpf) {
        if (is_null($cpf)) {
            return false;
        }
        $result = DB::select('SELECT cpf FROM funcionario f JOIN colaborador c
                                    ON f.colab_id = c.id 
                                WHERE c.cpf = ?', [$cpf]);
        //return ($result['cpf'] !== null)? 'true' : 'false';
        return empty($result)? false : true;
    }

    /**
     * Para carregar o catálogo de funcionários, basta passar:
     *  - funcionario.id
     *  - pessoa.nome
     *  - colabDoc.cpf
     *  - colab.situacao
     *  - colab.cargo (atual) colab_tem_cargo.e_cargo_atual = T
     */
    public function listSimplified() {
        $result = DB::select('SELECT f.id as `func_id`
                                , p.nome as `nome`
                                , c.cpf as `cpf`
                                , c.situacao as `situacao`
                                , cargo.nome as `cargo` 
                            FROM funcionario f JOIN colaborador c ON f.colab_id = c.id   
                                JOIN pessoa p ON p.id = c.pessoa_id 
                                JOIN colab_tem_cargo ctc ON ctc.colab_id = c.id 
                                JOIN cargo ON cargo.id = ctc.cargo_id
                            WHERE ctc.e_cargo_atual = true');
        return $result;
    }
}
