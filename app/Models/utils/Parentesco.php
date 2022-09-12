<?php

namespace App\Models\utils;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model {
    use HasFactory;

    protected $table = 'parentesco';
    public $timestamps = false;

    protected $fillable = array('nome');
    
    protected $guarded = ['id'];
}
