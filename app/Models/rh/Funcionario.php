<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\rh\Dependente;
use App\Models\rh\Remuneracao;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionario';
    protected $fillable = [
        'pis', 'ctps', 'ctps_uf', 'eleitor_numero', 'eleitor_zona', 'eleitor_secao', 'reserv_numero', 'reserv_orgao', 'reserv_serie'
    ];
    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function dependentes()
    {
        return $this->hasMany(Dependente::class);
    }

    public function remuneracoes()
    {
        return $this->hasMany(Remuneracao::class);
    }
}
