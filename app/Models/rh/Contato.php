<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model {
    use HasFactory;

    protected $table = 'contato';
    protected $fillable =['logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep','telefone', 'celular', 'email', 'ibge'];

    public $timestamps = true;
}

