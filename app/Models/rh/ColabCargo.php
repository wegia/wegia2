<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ColabCargo extends Model {
    use HasFactory;

    protected $table = 'colab_tem_cargo';
    protected $fillable = ['inicio', 'fim'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function cargos(): BelongsToMany
    {
        return $this->belongsToMany(Cargos::class);
    }

    public function colaboradores(): BelongsToMany
    {
        return $this->belongsToMany(Colaborador::class);
    }



}
