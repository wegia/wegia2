<?php

namespace App\Models\rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CargoColaborador extends Model {
    use HasFactory;

    protected $table = 'cargo_colaborador';
    protected $fillable = ['inicio', 'fim'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function cargos(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }

    public function colaboradores(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }



}
