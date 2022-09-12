<?php

namespace App\Models\utils;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model {
    use HasFactory;
    protected $table = 'uf';
    public $timestamps = false;

    protected $fillable = array('nome', 'sigla');

    protected $guarded = ['id'];
}
