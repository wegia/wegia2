<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ColabEscala extends Model {
    use HasFactory;

    protected $table = 'colab_tem_escala';
    protected $fillable = ['inicio', 'fim'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function escalas(): BelongsToMany
    {
        return $this->belongsToMany(Escala::class);
    }

    public function colaboradores(): BelongsToMany
    {
        return $this-> belongsToMany(Colaborador::class);
    }
}
