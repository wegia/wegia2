<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Colaborador;
use App\Models\Contato;


class Pessoa extends Model {
    use HasFactory;

    protected $table = 'pessoa';
    public $timestamps = false;

    protected $fillable = array('nome', 'genero', 'nascimento', 'foto'
            , 'nome_mae', 'nome_pai', 'tipo_sangue');

    protected $guarded = ['id'];

    /**
     * Function to recover person documents 
     *  -> (One-to-One relationship Pessoa.id - Contato.pessoa_id)
     * 
     */
    public function contato() {
        return $this->hasOne(Contato::class, 'pessoa_id');
    }

    /**
     * Function to recover person documents 
     *  -> (One-to-One relationship Pessoa.id - Colaborador.pessoa_id)
     * 
     */
    public function colaborador() {
        return $this->hasOne(Colaborador::class, 'pessoa_id');
    }

    public function getByFuncionario($funcId) {
        return DB::select('SELECT p.* FROM pessoa p JOIN colaborador c ON c.pessoa_id = p.id 
                                JOIN funcionario f ON f.colab_id = c.id
                                WHERE p.id = ?', array($funcId));

    }
}
