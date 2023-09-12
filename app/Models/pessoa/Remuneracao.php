<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Remuneracao extends Model {
    use HasFactory;

    protected $table = 'remuneracao';
    protected $fillable =['valor', 'inicio', 'fim'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function tiposRemuneracao(): BelongsTo
    {
        return $this->belongsTo(TipoRemuneracao::class);
    }


}
