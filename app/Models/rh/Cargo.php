<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargo';
    protected $fillable = ['nome', 'descricao'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function colabCargos(): HasMany
    {
        return $this->hasMany(ColabCargo::class);
    }
}
