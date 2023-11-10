<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
