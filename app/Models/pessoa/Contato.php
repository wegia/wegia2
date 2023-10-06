<?php

namespace App\Models\pessoa;

use App\Models\pessoa\utils\Uf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function uf(): BelongsTo{
        return $this->belongsTo(Uf::class);
    }
}

