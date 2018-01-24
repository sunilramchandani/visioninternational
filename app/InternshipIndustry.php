<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipIndustry extends Model
{
    protected $table = 'internship_industry'; 
    protected $primaryKey = 'industry_id';

    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }
}
