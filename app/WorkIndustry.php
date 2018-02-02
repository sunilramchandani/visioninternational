<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkIndustry extends Model
{
    protected $table = 'work_industry'; 
    protected $primaryKey = 'id';

    public function workCompany()
    {
        return $this->belongsTo('App\WorkCompany', 'company_id');
    }//
}
