<?php

namespace App\Models\rh;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model {
    use HasFactory;

    protected $table = 'voluntario';
    public $timestamps = false;

    protected $fillable = array('colab_id', 'disponib_semana', 'disponib_horas', 'descricao');

    protected $guarded = ['id'];

    public function hasCPFSaved($cpf) {
        $result = DB::select('SELECT cpf FROM voluntario v JOIN colaborador c
                            ON v.colab_id = c.id JOIN colab_doc cd ON
                            cd.colab_id = c.id
                            WHERE cd.cpf = ?', [$cpf]);
        return empty($result)? false : true;
    }

}
