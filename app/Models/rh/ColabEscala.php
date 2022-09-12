<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColabEscala extends Model {
    use HasFactory;

    protected $table = 'colab_tem_escala';
    public $timestamps = false;

    protected $fillable = array('colab_id', 'escala_id', 'tipo_id', 'inicio', 'fim');

    protected $guarded = ['id'];
    
}
