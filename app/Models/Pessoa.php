<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Colaborador;
use App\Models\Contato;


class Pessoa extends Model {
    use HasFactory;

    protected $table = 'pessoa';
    protected $fillable = ['nome', 'genero', 'nascimento', 'foto', 'nome_mae', 'nome_pai', 'tipo_sangue'];
    protected $guarded = ['id'];

    public $timestamps = false;


    public function contato() {
        return $this->hasOne(Contato::class);
    }
    
    public function colaborador() {
        return $this->hasOne(Colaborador::class);
    }
}
