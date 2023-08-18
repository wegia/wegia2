<?php

namespace App\Models\utils;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model {
    use HasFactory;
    protected $table = 'uf';
    protected $fillable = ['nome', 'sigla'];
    protected $guarded = ['id'];

    public $timestamps = false;
}
