<?php

namespace App\Models\rh;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Arquivo extends Model {
    use HasFactory;

    protected $table = 'arquivo';
    protected $fillable = ['descricao', 'data_cadastro', 'foto'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function pessoa(): HasOne
    {
        return $this-> hasOne(Pessoa::class);
    }

    public function tipoArquivo(): HasOne
    {
        return $this-> hasOne(TipoArquivo::class);
    }

}
