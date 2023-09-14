<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoAtendido extends Model
{
    use HasFactory;
    protected $table = 'tipo_atendido';

    public $timestamps = false;


    public function atendidos(): HasMany{
        return $this->hasMany(Atendido::class);
    }
}
