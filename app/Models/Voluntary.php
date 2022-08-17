<?php
    namespace App\Models;

    class Voluntary extends Model {
    
        protected $table = 'voluntary';
        public $timestamps = false;
    
        protected $fillable = array('person_id', 'voluntary_role_id', 'admission_date', 'status');
    
        protected $guarded = ['id'];
    
        public function hasCPFSaved($cpf) {
            $result = DB::select('SELECT cpf FROM person p JOIN person_docs pd
                                ON p.id = pd.person_id WHERE pd.cpf = ?', [$cpf]);
            return empty($result)? false : true;
        }
    
        
    
    }

?>