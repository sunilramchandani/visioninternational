<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkCompany extends Model
{
    use SoftDeletes;
    protected $table = 'work_company'; 

    protected $fillable = [
        'company_name',
        'description',
        'housing_type',
        'housing_distance',
        'housing_address',
        'full_address',
        'stipend',
        'state',
        'country',
        'image',
    ];
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];


    public function work_opportunity()
    {
        return $this->hasMany('App\WorkOpportunity', 'company_id');
    }

    public function work_qualifications()
    {
        return $this->hasMany('App\WorkQualification', 'company_id');
    }
    public function work_industry()
    {
        return $this->hasMany('App\WorkIndustry', 'company_id');
    }
    public function work_duration()
    {
        return $this->hasMany('App\WorkDuration', 'company_id');
    }
}
