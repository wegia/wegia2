<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escala extends Model {
    use HasFactory;

    protected $table = 'escala';
    public $timestamps = false;

    protected $fillable = array('nome', 'descricao');
    
    protected $guarded = ['id'];

    public static function listByColaborador($colabId) {
        return DB::select('SELECT e.* FROM colab_tem_escala cte JOIN escala e ON cte.escala_id = e.id 
                                WHERE cte.colab_id = ?', array($colabId));
    }
}
