<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dependente extends Model {
    use HasFactory;

    protected $table = 'dependente';
    protected $fillable = [];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class);
    }
}
