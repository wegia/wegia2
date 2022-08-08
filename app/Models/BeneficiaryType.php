<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryType extends Model {
    protected $table = 'beneficiary_type';
    public $timestamps = false;

    protected $fillable = array('name', 'description');

    protected $guarded = ['id'];
}