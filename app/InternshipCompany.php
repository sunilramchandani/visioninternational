<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipCompany extends Model
{
    use SoftDeletes;

    protected $table = 'internship_company'; 

    protected $fillable = [
        'company_name',
        'description',
        'housing_type',
        'housing_distance',
        'housing_address',
        'full_address',
        'stipend',
        'state',
        'image',
    ];
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];


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