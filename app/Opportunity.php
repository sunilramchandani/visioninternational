<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = 'opportunity'; 

    protected $primaryKey = 'id';

    protected $fillable = [
        'company_id',
        'opportunity_id'
    ];


    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }

    public function opportunitylist()
    {
        return $this->belongsTo('App\OpportunityList', 'opportunity_id');
    }

}


