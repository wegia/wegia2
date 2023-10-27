<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoOcorrencia extends Model
{
    use HasFactory;
    protected $table = 'tipo_ocorrencia';
    public $timestamps = false;

    public function ocorrencias(): HasMany {
        return $this->hasMany(Ocorrencia::class);
    }
}
