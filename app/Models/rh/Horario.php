<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Horario extends Model {
    use HasFactory;

    protected $table = 'horario';
    protected $fillable = ['entrada', 'saida', 'dia_semana', 'inicio', 'fim'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function horarios(): BelongsTo
    {
        return $this->belongsTo(Horario::class);
    }


}
