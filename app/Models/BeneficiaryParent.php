<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryParent extends Model {
    
    protected $table = 'beneficiary_parent';
    public $timestamps = false;

    protected $fillable = array('beneficiary_id', 'beneficiary_parent_kinship_id', 'person_id');

    protected $guarded = ['id'];
}
