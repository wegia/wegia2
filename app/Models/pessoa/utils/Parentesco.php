<?php

namespace App\Models\pessoa\utils;

use App\Models\pessoa\Familiar;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parentesco extends Model {
    use HasFactory;

    protected $table = 'parentesco';
    protected $fillable = array('nome');
    protected $guarded = ['id'];

    public $timestamps = false;

    public function familiares(): HasMany{
        return $this->hasMany(Familiar::class);
    }
}
