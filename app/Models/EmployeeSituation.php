<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSituation extends Model {
    protected $table = 'employee_situation';
    public $timestamps = false;

    protected $fillable = array('datetime', 'description', 'photo', 'photo_extension');

    protected $guarded = ['id'];
}
