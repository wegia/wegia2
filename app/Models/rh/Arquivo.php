<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model {
    use HasFactory;

    protected $table = 'arquivo';
    public $timestamps = false;

    protected $fillable = array('pessoa_id', 'tipo_id', 'descricao', 'data_cadastro', 'foto');

    protected $guarded = ['id'];

}
