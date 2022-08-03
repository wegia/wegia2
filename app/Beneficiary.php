<?php

namespace wegia2;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model {
    protected $table = 'beneficiary';
    public $timestamps = false;

    protected $fillable = array('person_id', 'beneficiary_type_id', 'beneficiary_status_id');

    protected $guarded = ['id'];
}
