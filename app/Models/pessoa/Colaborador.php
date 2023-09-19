<?php

namespace App\Models\pessoa;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\pessoa\Arquivo;
use App\Models\pessoa\Funcionario;
use App\Models\pessoa\Voluntario;
use App\Models\pessoa\Cargo;
use App\Models\pessoa\Horario;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaborador';
    protected $fillable = ['pessoa_id','admissao', 'situacao', 'cpf', 'rg', 'rg_orgao', 'rg_expedicao', 'rg_vencimento'];
    public $timestamps = false;

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class);
    }

    public function voluntarios(): HasMany
    {
        return $this->hasMany(Voluntario::class);
    }

    public function funcionarios(): HasMany
    {
        return $this->hasMany(Funcionario::class);
    }

    public function escalas(): HasMany
    {
        return $this->hasMany(Escala::class);
    }

    public function cargoColaboradores(): HasMany
    {
        return $this->hasMany(CargoColaborador::class);
    }
}
