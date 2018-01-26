<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = 'opportunity'; 
    protected $primaryKey = 'opportunity_id';
    public $timestamps = false;

    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }
}


