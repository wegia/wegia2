<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remuneracao extends Model {
    use HasFactory;

    protected $table = 'remuneracao';
    public $timestamps = false;

    protected $fillable = array('func_id', 'tipo_id', 'valor', 'inicio', 'fim');
    
    protected $guarded = ['id'];

}
