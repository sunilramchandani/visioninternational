<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $table = 'internship_company'; 
    protected $primaryKey = 'company_id';

    public function opportunity()
    {
        return $this->hasMany('App\Opportunity', 'company_id');
    }

    public function qualifications()
    {
        return $this->hasMany('App\Qualification', 'company_id');
    }
    public function internship_industry()
    {
        return $this->hasMany('App\InternshipIndustry', 'company_id');
    }
    public function internship_duration()
    {
        return $this->hasMany('App\InternshipDuration', 'company_id');
    }

}
