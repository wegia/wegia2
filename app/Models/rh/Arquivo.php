<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model {
    use HasFactory;

    protected $table = 'arquivo';
    protected $fillable = ['descricao', 'data_cadastro', 'foto'];
    protected $guarded = ['id'];

    public $timestamps = false;
}
