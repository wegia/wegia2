<?php

namespace wegia2;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
    
    protected $table = 'contact';
    public $timestamps = false;

    protected $fillable = array('street', 'number', 'complement', 'district', 'city', 'state', 'zip_code', 'phone', 'mobile', 'email');

    //protected $guarded = ['id'];
}

