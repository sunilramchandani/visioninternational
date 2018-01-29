<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipDuration extends Model
{
    protected $table = 'internship_duration'; 
    protected $primaryKey = 'duration_id';
    public $timestamps = false;

    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }
}
