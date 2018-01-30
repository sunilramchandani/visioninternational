<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = 'opportunity'; 

    protected $primaryKey = 'id';


    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }
}


