<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model {
    use HasFactory;

    protected $table = 'cargo';
    public $timestamps = false;

    protected $fillable = array('nome', 'descricao');

    protected $guarded = ['id'];

    public static function listByColaborador($colabId) {
        return DB::select('SELECT c.* FROM colab_tem_cargo ctc JOIN cargo c ON ctc.cargo_id = c.id 
                                WHERE ctc.colab_id = ?', array($colabId));
    }
}
