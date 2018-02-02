<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDuration extends Model
{
    protected $table = 'work_duration'; 
    protected $primaryKey = 'id';

    public function workCompany()
    {
        return $this->belongsTo('App\WorkCompany', 'company_id');
    }
}
