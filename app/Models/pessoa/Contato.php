<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contato extends Model {
    use HasFactory;

    protected $table = 'contato';
    protected $fillable =['pessoa_id','logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep','telefone', 'celular', 'email', 'ibge'];

    public $timestamps = true;

    public function pessoa(): HasOne
    {
        return $this->hasOne(Pessoa::class);
    }
}

