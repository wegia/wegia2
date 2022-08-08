<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSituationLog extends Model {
    protected $table = 'employee_situation_log';
    public $timestamps = false;

    protected $fillable = array('employee_id', 'employee_situation_id');

    
}
