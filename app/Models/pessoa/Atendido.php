<?php

namespace App\Models\pessoa;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Atendido extends Model
{
    use HasFactory;
    protected $table = 'atendido';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function tipoAtendido():BelongsTo{
        return $this->belongsTo(TipoAtendido::class);
    }

    public function statusAtendido():BelongsTo{
        return $this->belongsTo(StatusAtendido::class);
    }

    public function ocorrencias():HasMany{
        return $this->hasMany(Ocorrencia::class);
    }

    
}
