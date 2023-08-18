<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoArquivo extends Model {
    use HasFactory;

    protected $table = 'tipo_arquivo';
    protected $fillable = ['nome'];
    protected $guarded = ['id'];

    public $timestamps = false;
}
