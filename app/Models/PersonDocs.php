<?php

namespace wegia2;

use Illuminate\Database\Eloquent\Model;

class PersonDocs extends Model {
    
    protected $table = 'person_docs';
    public $timestamps = false;

    protected $fillable = array('person_id', 'cpf', 'rg', 'rg_agency', 'rg_date', 'ibge');

//    protected $guarded = ['id'];
}
