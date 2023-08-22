<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoArquivo extends Model {
    use HasFactory;

    protected $table = 'tipo_arquivo';
    protected $fillable = ['nome'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function arquivos(): HasMany
    {
        return $this->hasMany(Arquivo::class);
    }

}
