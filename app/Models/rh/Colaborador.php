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

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaborador';
    protected $fillable = ['admissao', 'situacao', 'cpf', 'rg', 'rg_orgao', 'rg_expedicao', 'rg_vencimento'];
    public $timestamps = false;


    public function funcionario()
    {
        return $this->hasOne(Funcionario::class);
    }

    public function voluntario()
    {
        return $this->hasOne(Voluntario::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class);
    }

    public function escalas()
    {
        return $this->belongsToMany(Escala::class, 'colab_tem_escala', 'colaborador_id', 'escala_id');
    }

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'colab_tem_cargo', 'colaborador_id', 'cargo_id');
    }
}
