<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeShift extends Model {
    protected $table = 'employee_shift';
    public $timestamps = false;

    protected $fillable = array('employee_id', 'employee_shift_type_id', 'employee_timesheet_id'
                            , 'workload', 'start_at1', 'end_at1', 'start_at2', 'end_at2', 'total'
                            , 'worked_days', 'dayoff');


    protected $guarded = ['id'];
}
