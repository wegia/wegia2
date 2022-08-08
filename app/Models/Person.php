<?php 

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {

    protected $table = 'person';
    public $timestamps = false;

    protected $fillable = array('name', 'gender', 'birthday', 'photo', 'mother_name', 'father_name', 'blood_type');

    protected $guarded = ['id'];

    /**
     * Function to recover person documents 
     *  -> (One-to-One relationship Person.id - PersonDocs.person_id)
     * 
     */
    public function documents() {
        return $this->hasOne(PersonDocs::class, 'person_id');
    }

}
