<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model {
    use HasFactory;

    protected $table = 'cargo';
    protected $fillable =['nome', 'descricao'];
    protected $guarded = ['id'];
    
    public $timestamps = false;
}
