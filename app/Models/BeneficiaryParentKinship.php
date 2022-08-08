<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryParentKinship extends Model {
    protected $table = 'beneficiary_parent_kinship';
    public $timestamps = false;

    protected $fillable = array('name');

    protected $guarded = ['id'];
}
