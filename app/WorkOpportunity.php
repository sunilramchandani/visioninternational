<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOpportunity extends Model
{
    protected $table = 'work_opportunity'; 

    protected $primaryKey = 'id';


    public function workCompany()
    {
        return $this->belongsTo('App\WorkCompany', 'company_id');
    }

    public function opportunitylist()
    {
        return $this->belongsTo('App\OpportunityList', 'opportunity_id');
    }

    


}
