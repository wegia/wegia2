<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColabCargo extends Model {
    use HasFactory;

    protected $table = 'colab_tem_cargo';
    public $timestamps = false;

    protected $fillable = array('colab_id', 'cargo_id', 'inicio', 'fim');

    protected $guarded = ['id'];

}
