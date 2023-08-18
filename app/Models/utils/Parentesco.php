<?php

namespace App\Models\utils;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model {
    use HasFactory;

    protected $table = 'parentesco';
    protected $fillable = array('nome');
    protected $guarded = ['id'];

    public $timestamps = false;
}
