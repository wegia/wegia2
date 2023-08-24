<?php

namespace App\Models\rh;

use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Arquivo extends Model {
    use HasFactory;

    protected $table = 'arquivo';
    protected $fillable = ['descricao', 'data_cadastro', 'foto'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function pessoa(): BelongsTo
    {
        return $this-> belongsTo(Pessoa::class);
    }

    public function tipoArquivo(): BelongsTo
    {
        return $this-> belongsTo(TipoArquivo::class);
    }

}
