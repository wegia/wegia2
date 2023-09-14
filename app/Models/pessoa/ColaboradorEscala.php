<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ColaboradorEscala extends Model {
    use HasFactory;

    protected $table = 'colaborador_escala';
    protected $fillable = ['colaborador_id','escala_id','tipo_escala_id','inicio', 'fim'];
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
