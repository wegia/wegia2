<?php

namespace App\Models\pessoa;

use App\Models\pessoa\OcorrenciaArquivo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ocorrencia extends Model
{
    use HasFactory;
    protected $table = 'ocorrencia';
    public $timestamps = false;

    public function tipoOcorrencia(): BelongsTo{
        return $this->belongsTo(TipoOcorrencia::class);
    }

    public function atendido(): BelongsTo{
        return $this->belongsTo(Atendido::class);
    }

    public function ocorrenciasArquivos(): HasMany{
        return $this->hasMany(OcorrenciaArquivo::class);
    }
}
