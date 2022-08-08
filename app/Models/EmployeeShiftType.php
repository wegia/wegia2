<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeShiftType extends Model {
    protected $table = 'employee_shift_type';
    public $timestamps = false;

    protected $fillable = array('name');


    protected $guarded = ['id'];
}
