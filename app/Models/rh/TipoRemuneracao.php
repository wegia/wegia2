<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoRemuneracao extends Model
{
    use HasFactory;

    protected $table = 'tipo_remuneracao';
    protected $fillable = ['nome'];
    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function remuneracaoes(): HasMany
    {
        return $this->hasMany(Remuneracao::class);
    }


}
