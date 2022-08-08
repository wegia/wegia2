<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocs extends Model {
    protected $table = 'employee_docs';
    public $timestamps = false;

    protected $fillable = array('employee_id', 'pis', 'ctps', 'ctps_state'
            , 'voter_doc_number', 'voter_doc_zone', 'voter_doc_section'
            , 'army_doc_number', 'army_doc_agency', 'army_doc_series');

    protected $guarded = ['id'];

}
