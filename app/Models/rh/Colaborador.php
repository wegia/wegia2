<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\rh\Arquivo;
use App\Models\rh\Funcionario;
use App\Models\rh\Voluntario;
use App\Models\rh\Cargo;
use App\Models\rh\Horario;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaborador';
    protected $fillable = ['admissao', 'situacao', 'cpf', 'rg', 'rg_orgao', 'rg_expedicao', 'rg_vencimento'];
    public $timestamps = false;

    public function pessoa(): HasOne
    {
        return $this->hasOne(Pessoa::class);
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

    public function cargos(): HasMany
    {
        return $this->hasMany(Cargo::class);
    }
}
