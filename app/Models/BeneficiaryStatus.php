<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryStatus extends Model {
    protected $table = 'beneficiary_status';
    public $timestamps = false;

    protected $fillable = array('status');

    protected $guarded = ['id'];
}
