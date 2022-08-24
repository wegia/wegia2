<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model {
    use HasFactory;
    
    protected $table = 'contato';
    public $timestamps = true;

    protected $fillable = array('pessoa_id', 'logradouro', 'numero'
            , 'complemento', 'bairro', 'cidade', 'estado', 'cep'
            , 'telefone', 'celular', 'email');

    //protected $guarded = ['id'];

    public function getPessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public static function get($pessoaId) {
        return DB::select('SELECT * FROM contato c WHERE c.pessoa_id = ?', array($pessoaId));
    }
}

