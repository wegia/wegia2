<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remuneracao extends Model {
    use HasFactory;

    protected $table = 'remuneracao';
    protected $fillable =['valor', 'inicio', 'fim'];
    protected $guarded = ['id'];
    
    public $timestamps = false;



}
