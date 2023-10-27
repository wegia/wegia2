<?php

namespace App\Models\pessoa;

use App\Models\Pessoa;
use App\Models\pessoa\utils\Parentesco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Familiar extends Model
{
    use HasFactory;
    protected $table = 'familiar';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function pessoa(): BelongsTo{
        return $this->belongsTo(Pessoa::class);
    }

    public function parentesco(): BelongsTo{
        return $this->belongsTo(Parentesco::class);
    }
}
