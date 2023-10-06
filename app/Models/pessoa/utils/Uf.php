<?php

namespace App\Models\pessoa\utils;

use App\Models\pessoa\Contato;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Uf extends Model {
    use HasFactory;
    protected $table = 'uf';
    protected $fillable = ['nome', 'sigla'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function contatos(): HasMany{
        return $this->hasMany(Contato::class);
    }
}
