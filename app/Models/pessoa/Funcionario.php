<?php

namespace App\Models\pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\pessoa\Dependente;
use App\Models\pessoa\Remuneracao;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionario';
    protected $fillable = [
        'colaborador_id','pis', 'ctps', 'ctps_uf', 'eleitor_numero', 'eleitor_zona', 'eleitor_secao', 'reserv_numero', 'reserv_orgao', 'reserv_serie'
    ];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function dependentes():HasMany
    {
        return $this->hasMany(Dependente::class);
    }

    public function remuneracoes():HasMany
    {
        return $this->hasMany(Remuneracao::class);
    }

    public function colaborador():BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }


}
