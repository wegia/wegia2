<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRemuneracao extends Model {
    use HasFactory;

    protected $table = 'tipo_remunecacao';
    
    public $timestamps = false;

    protected $fillable = array('nome');

    protected $guarded = ['id'];
}
