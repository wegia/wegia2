<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEscala extends Model {
    use HasFactory;
    protected $table = 'tipo_escala';
    
    public $timestamps = false;

    protected $fillable = array('nome');

    protected $guarded = ['id'];
}
