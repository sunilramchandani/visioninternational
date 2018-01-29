<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = 'opportunity'; 
<<<<<<< HEAD
    protected $primaryKey = 'id';
=======
    protected $primaryKey = 'opportunity_id';
        
>>>>>>> 55859f55f49073c7f2da6ae96598cd0f0bafe716

    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }
}


