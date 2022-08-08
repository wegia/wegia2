<?php 

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    
    protected $table = 'employee';
    public $timestamps = false;

    protected $fillable = array('person_id', 'employee_role_id', 'admission_date', 'status');

    protected $guarded = ['id'];

    public function hasCPFSaved($cpf) {
        $result = DB::select('SELECT cpf FROM person p JOIN person_docs pd
                            ON p.id = pd.person_id WHERE pd.cpf = ?', [$cpf]);
        //return ($result['cpf'] !== null)? 'true' : 'false';
        return empty($result)? false : true;
    }

    

}
