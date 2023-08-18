<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model {
    use HasFactory;

    protected $table = 'voluntario';
    protected $fillable = ['disponib_semana', 'disponib_horas', 'descricao'];
    protected $guarded = ['id'];
    
    public $timestamps = false;



}
