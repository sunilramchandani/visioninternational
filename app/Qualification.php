<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $table = 'qualifications'; 
    protected $primaryKey = 'qualification_id';
    public $timestamps = false;

    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }

}
