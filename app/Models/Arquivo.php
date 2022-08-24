<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model {
    use HasFactory;

    protected $table = 'arquivo';
    public $timestamps = false;

    protected $fillable = array('colab_id', 'tipo_id', 'descricao', 'data_cadastro', 'foto');

    protected $guarded = ['id'];

    public static function  listByPessoa($pessoaId) {
        return DB::select('SELECT a.* FROM arquivo a WHERE a.pessoa_id  = ?', array($pessoaId));
    }
}
