<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model {
    use HasFactory;
    
    protected $table = 'contato';
    public $timestamps = true;

    protected $fillable = array('pessoa_id', 'logradouro', 'numero'
            , 'complemento', 'bairro', 'cidade', 'estado', 'cep'
            , 'telefone', 'celular', 'email', 'ibge');

    //protected $guarded = ['id'];

    public function getPessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

}

