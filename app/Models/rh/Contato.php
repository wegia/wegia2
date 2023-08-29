<?php

namespace App\Models\rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contato extends Model {
    use HasFactory;

    protected $table = 'contato';
    protected $fillable =['logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep','telefone', 'celular', 'email', 'ibge'];

    public $timestamps = true;

    public function pessoa(): HasOne
    {
        return $this->hasOne(Pessoa::class);
    }
}

