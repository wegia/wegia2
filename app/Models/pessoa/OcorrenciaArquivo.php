<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OcorrenciaArquivo extends Model
{
    use HasFactory;
    protected $table = 'ocorrencia_arquivo';
    public $timestamps = false;
    


    public function ocorrencia():BelongsTo{
        return $this->belongsTo(Ocorrencia::class);
    }
}
