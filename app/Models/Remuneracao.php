<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remuneracao extends Model {
    use HasFactory;

    protected $table = 'remuneracao';
    public $timestamps = false;

    protected $fillable = array('func_id', 'tipo_id', 'valor', 'inicio', 'fim');
    
    protected $guarded = ['id'];

    public static function listByFuncionario($funcId) {
        return DB::select('SELECT r.*, tr.nome as tipo  FROM remuneracao r 
                            JOIN tipo_remuneracao tr ON r.tipo_id = tr.id 
                            WHERE r.func_id = ?', array($funcId));
    }
}
