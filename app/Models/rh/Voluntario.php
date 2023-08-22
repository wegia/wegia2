<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voluntario extends Model {
    use HasFactory;

    protected $table = 'voluntario';
    protected $fillable = ['disponib_semana', 'disponib_horas', 'descricao'];
    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function colaborador():BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }

}
