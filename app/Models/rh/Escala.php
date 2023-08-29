<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escala extends Model {
    use HasFactory;

    protected $table = 'escala';
    protected $fillable = ['nome', 'descricao'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function colaboradorEscalas(): HasMany
    {
        return $this->hasMany(ColaboradorEscala::class);
    }
}
