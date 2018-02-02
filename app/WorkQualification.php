<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkQualification extends Model
{
    protected $table = 'work_qualifications'; 
    protected $primaryKey = 'id';

    public function workCompany()
    {
        return $this->belongsTo('App\WorkCompany', 'company_id');
    }
}
