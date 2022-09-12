<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model {
    use HasFactory;
    
    protected $table = 'horario';
    public $timestamps = false;

    protected $fillable = array('colab_id', 'entrada', 'saida', 'dia_semana', 'inicio', 'fim');
    
    protected $guarded = ['id'];

}
