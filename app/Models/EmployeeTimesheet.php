<?php

namespace wegia2;

use Illuminate\Database\Eloquent\Model;

class EmployeeTimesheet extends Model {
    protected $table = 'employee_timesheet';
    public $timestamps = false;

    protected $fillable = array('name');


    protected $guarded = ['id'];
}
