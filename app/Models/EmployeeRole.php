<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model {
    protected $table = 'employee_role';
    public $timestamps = false;

    protected $fillable = array('name');

    protected $guarded = ['id'];
}
